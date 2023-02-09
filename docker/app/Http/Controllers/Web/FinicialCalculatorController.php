<?php

namespace App\Http\Controllers\Web;

use App\Helper\HelperClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \Validator;
use Illuminate\Support\Facades\Mail;
use App\FinicialCalculator as Calculator; 
use stdClass;
// use Barryvdh\DomPDF\PDF; 
use Barryvdh\DomPDF\Facade as PDF;
use App\Helper\CalculatorClass as Fin;
use App\Helper\IntegrationParties;
use App\Http\Controllers\Controller;

class FinicialCalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = HelperClass::popularCurrenciens(); 
        $currency =  Session::get('currency');
        $calculator = new stdClass();
        $calculator->mortgage = 0;$calculator->mobility = 0; $calculator->expenses = 0;
        $calculator->utility = 0;$calculator->dept_repay = 0; 
        $calculator->other_income = 0; $calculator->extra_save = 0;
        $calculator->periodic_savings = 0; $calculator->education = 0;
        $calculator->charity = 0; 
        return view('guest.calculator', compact('currencies', 'currency', 'calculator')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'periodic_savings' => 'required|numeric', 
            'education' => 'required|numeric', 
            'mortgage' => 'required|numeric', 
            'expenses' => 'required|numeric', 
            'utility' => 'required|numeric', 
            'mobility' => 'required|numeric', 
            'dept_pay' => 'required|numeric',  
            'charity' => 'required|numeric',  
            'income' => 'required|numeric', 
            'extra' => 'required|numeric', 
        ]); 
        $cost = $request->periodic_savings + $request->education + $request->mortgage + $request->mobility + $request->utility  + 
                    $request->charity + $request->expenses + $request->dept_pay;
 
        $saving = $request->income + $request->extra; 
        $user = auth()->user();
        $currency = explode(" ", $request->currency)[0];
        Session::put('currency', $request->currency);
        Session::put('current', $currency);
        
        if ($cost > 10 ) {
            // $currenttime = ($request->extra / $cost) * (360/12); && $saving > 0
            // $oldper = ($request->income / $cost) * (100);
            $currenttime = (30 * $request->extra)  / $cost;
            $currentper =  ($request->income * 100) / $cost;
            
            Session::put('currenttime', $currenttime);
            Session::put('currentper', $currentper);

            $timecolor = HelperClass::daysPercentageColor($currenttime);
            $percolor = HelperClass::numPercentageColor($currentper);

            $info = ''; $tok = '';

            if($user ){
                $fin =  Fin::finicial($user);
                Session::put('currency', $request->currency);
                Session::put('current', $currency);
                $calculate = Calculator::where('user_id', $user->id)->first();
                $calculate->currency = $request->currency;
                $calculate->periodic_savings = $request->periodic_savings;
                $calculate->education = $request->education;
                $calculate->mortgage = $request->mortgage;
                $calculate->expenses = $request->expenses;
                $calculate->utility = $request->utility;
                $calculate->mobility = $request->mobility;
                $calculate->dept_repay = $request->dept_pay;
                $calculate->charity = $request->charity;
                $calculate->other_income = $request->income;
                $calculate->extra_save = $request->extra;
                
                if ($fin['saving'] == 0 && $fin['cost'] == 0) {
                    $calculate->save();
                }
                Session::put('cost', $cost);
                Session::put('saving', $saving);
                Session::put('current', $currency);  
                $data = [
                    'currency' => $currency, 'timeper' => round(($currenttime / 360) * 100), 
                    'cost' => number_format($cost) , 'saving' => number_format($saving), 
                    'currenttime' => ($currenttime),  'currentper' => round($currentper),
                    'timecolor' => $timecolor,  'percolor' => $percolor, 
                    'user' => $user, 'info' => $info,  'tok' => $tok
                ]; 
                return view('guest.finicialstatus')->with($data); 
            }else{
                $symbol = HelperClass::currencySymbol($request->currency);
                Session::put('symbol', $symbol);
                Session::put('currency', $request->currency);
                Session::put('current', $currency);
                Session::put('mortgage', $request->mortgage);
                Session::put('periodic_savings', $request->periodic_savings);
                Session::put('education', $request->education);
                Session::put('expenses', $request->expenses);
                Session::put('utility', $request->utility);
                Session::put('mobility', $request->mobility);
                Session::put('dept_pay', $request->dept_pay);
                Session::put('charity', $request->charity);
                Session::put('extra', $request->extra);
                Session::put('cost', $cost);
                Session::put('income', $request->income);
                Session::put('saving', $saving);
            }
            Session::put('income', $request->income);
          
            $data = [
                'currency' => $currency, 'timeper' => round(($currenttime / 360) * 100), 
                'cost' => number_format($cost) , 'saving' => number_format($saving), 
                'currenttime' => ($currenttime),  'currentper' => round($currentper),
                'timecolor' => $timecolor,  'percolor' => $percolor,
                'user' => $user,  'info' => $info,  'tok' => $tok
            ]; 
  
            return view('guest.finicialstatus')->with($data); 
        }else{ 
            $msg = "Cost of Living can not be 0";
            return redirect()->back()->with('error', $msg);
        }
    }

    public function improve(Request $request)
    {
        $user = auth()->user();
        $cost = Session::get('cost');
        $current = Session::get('current');
        $saving = Session::get('saving');
        if($user){
            $calculate = Calculator::where('user_id', $user->id)->first();
            $income =  $calculate->other_income;
        }else{
            $income = Session::get('income');
        }
       return view('guest.finicialimprove', compact('cost', 'saving', 'income','current','user'));
    }

    public function download(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $user = auth()->user();
        Session::put('email', $request->email);
        $cost = Session::get('cost');
        $saving = Session::get('saving');
        
        $currenttime =  Session::get('currenttime');
        $currentper = Session::get('currentper');
        $symbol = Session::get('symbol');
        
        $timecolor = HelperClass::daysPercentageColor($currenttime);
        $percolor = HelperClass::numPercentageColor($currentper);

        $currency = explode(" ", $request->currency)[0];
        
        $tok = false;
        $roce = Session::get('roce');
        $current = Session::get('current');
        $invest = Session::get('invest');
        $shortfall = Session::get('shortfall');
        $avr = Session::get('avr');
        $income = Session::get('income');
        $gap_invest = Session::get('investment');
        $time_finiancial = Session::get('time_finiancial');
        
        if($request->tok == "aghvbjbsnvnabnmbzjabmbnjsxbbjjsnm"){
            $tok = true; $pdf = 'roce_pdf'; 
            $subject =  "Your Financial Independence Status Result with Recommendations ";   
            $info = "A copy of your Summary & Recommendations has been sent to your email";
            $please = 'Please note that your personalized financial independence calculation result with recommendations has been downloaded directly to your device.';
        }else{ 
            $pdf = 'status_pdf';
            $please ='Please check your download folder, your personalized financial independence calculation result has been downloaded to your device.';
            $subject =  "Your Financial Independence Status Result ";   
            $info = "A copy of your Financial Independence Status Report has been sent to your email";
        }  
        
        $import_financial = IntegrationParties::create_contact_to_sendinblue($request->email);
        // Log::info($import_financial); 
        // var_dump($request->journey, $request->file('journey')); return;
        $data = [ 
            'email' => $request->email, 'please' => $please, 'journey' => $request->journey,
            'admin' => 'support@infoscert.com', 'subject' => $subject,
            'info' => $info, 'tok' => $tok, 'symbol' => $symbol,
            'income' => $income, 'gap_invest' => $gap_invest,
            // 'current_note' => $current_note,'per_note' => $per_note,
            //  
            'roce' => $roce, 'current' => $current, 'invest' => $invest,
            'shortfall' => $shortfall, 'avr' => $avr, 'time_finiancial' => $time_finiancial,

            'currency' => $currency, 'timeper' => round(($currenttime / 360) * 100), 
            'cost' => number_format($cost) , 'saving' => number_format($saving), 
            'currenttime' => number_format($currenttime),  'currentper' => round($currentper),
            'timecolor' => $timecolor,  'percolor' => $percolor,
            'user' => $user, 
        ];

        Mail::send('email.finiancial',compact('data'), function($message) use ($data){
            $message
                ->subject($data['subject'])
                ->to($data['email']); 
        });  
        
        $html = view("email.$pdf", $data)->render();
        
        $pdf = PDF::loadHTML($html);
        return $pdf->download('FinancialStatusDoc.pdf');
        return view('guest.finicialstatus')->with($data); 

    }

    public function recommend(Request $request)
    {
        $currency = Session::get('current');
       
        $user = auth()->user();
        $this->validate($request, [
            'roce' => 'required|integer|min:1|max:100',
            'invest' => 'required|numeric|min:1'
        ]);  
        $roce = $request->roce;
        $gap_invest = $request->invest;  
        if ($user) {
            $calculate = Calculator::where('user_id', $user->id)->first();
            $calculate->roce = $roce;
            $calculate->investment = $gap_invest;
            $calculate->save();
            $income =  $calculate->other_income; 
        } else {  
            Session::put('roce', $roce);
            Session::put('investment', $gap_invest);
            $income = Session::get('income');
        }

        $current = Session::get('current');
        $cost = Session::get('cost');
        $saving = Session::get('saving');
        
        $exp = ($cost * 12 ) * 100 ;  
        $shortfall = $cost - $income;  
        $avr = (($shortfall * 12) * 100) / $roce ;  
        // return $avr;
        if($gap_invest){
            $time_finiancial = ($avr / $gap_invest ) / 12 ;  
            $time_finiancial_chart = (int)$time_finiancial;
            $time_finiancial = number_format((int)$time_finiancial, 0);
        } else{
             $time_finiancial = 'N/A';
        }
        $invest = $exp / $request->roce; 
        Session::put('invest', $invest);
        Session::put('shortfall', $shortfall);
        Session::put('avr', $avr);
        Session::put('time_finiancial', $time_finiancial);
        return view('guest.finicialrecommend', 
                        compact('income','gap_invest','shortfall', 'avr', 
                                'time_finiancial' ,'invest', 'cost', 'roce', 
                                'current', 'user', 'time_finiancial_chart' )
                    );
    }

 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
