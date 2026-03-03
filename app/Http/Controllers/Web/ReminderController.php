<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Reminder;
use Illuminate\Support\Facades\Validator;

use App\FinicialCalculator as Calculator;
use App\Http\Controllers\Controller;
use DateTime;


class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $archive =  $request->get('archive');
        $calculate = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculate->currency)[0];
        $isreminder =  $reminders = Reminder::where('user_id', $user->id)->count();
        // return $isreminder;

        if($archive){
            $reminders = Reminder::where('user_id', $user->id)->where('complete', '1')
                            ->latest()->paginate(20);
        }else{
            $reminders = Reminder::where('user_id', $user->id)->where('complete', '0')
                                ->latest()->paginate(20);
        }
        foreach ($reminders as $reminder) {
            $alert = new DateTime(date('Y-m-d'));
            $reminder->dueday = $alert->diff(new DateTime($reminder->date)) ;
            $reminder->dueday = $reminder->dueday->days; 
        }


        $data = ['reminders' => $reminders, 'currency' => $currency, 'archive' => $archive, 'isreminder'=>$isreminder];
        return view('user.reminders.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $calculate = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculate->currency)[0];
        $days = [];
        $alert_days = [];
        for ($i=0; $i < 31; $i++) { 
           array_push($days, $i+1);
        }
        for ($i=0; $i < 15; $i++) { 
           array_push($alert_days, $i+1);
        }
        array_push($alert_days, 20, 25, 30);
        // var_dump($alert_days); return;
        $years = [date('Y'),  date('Y')+1 ];
        $months= ["1"=> "January", "2"=> "Febuary", "3"=> "March","4"=> "April",
                    "5"=> "May", "6"=> "June", "7"=> "July","8"=> "August",
                    "9"=> "Septempber", "10"=> "October", "11"=> "November","12"=> "December"];

        return view('user.reminders.new_reminder', compact('alert_days','days', 'months', 'years', "currency"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, ['alert_day'=> 'required', 'day'=> 'required', 'month' => 'required', 'year' => 'required']);
        $date = "$request->year-$request->month-$request->day";
        $alert = Null;
        // $alert = "$request->year-$request->month-$request->day";
        // if($request->alert_year && $request->alert_month && $request->alert_day){
        //     $alert = "$request->alert_year-$request->alert_month-$request->alert_day";
        // }
        Validator::extend('before_or_equal', function($attribute, $value, $parameters, $validator) {
            return strtotime($validator->getData()[$parameters[0]]) >= strtotime($value);
            }, 'Date entered is not correct.');

        $data = compact('date', 'alert'); 

        $validator = Validator::make($data, [
            'date' => 'required|date|after:yesterday',
            // 'alert' => 'required|date|after:yesterday|before_or_equal:date'
            // 'reminder'  => 'required|max:50',
            'amount' => 'numeric|min:0'
        ], [
            'date.after' => 'Date is not correct',
            // 'alert.after' => 'Date is not correct',
            // 'alert.before_or_equal' => 'Date is not correct'
        ])->validate();

        $alert = date('Y-m-d', strtotime("-$request->alert_day day", strtotime($date)) );

        $this->validate($request, [ 
            'reminder'  => 'required|max:50',
            'amount' => 'numeric|min:0'
        ]);
        
        $reminder = new Reminder(); 
        $reminder->user_id = $user->id;
        $reminder->name = $request->reminder;
        $reminder->date = $date;
        $reminder->note = $request->note;
        $reminder->amount = $request->amount;
        $reminder->alert = $alert;
        $reminder->due = $request->alert_day;
        $reminder->email = ($request->email) ? 1 : 0;
        $reminder->sms = ($request->sms) ? 1 : 0;
        $reminder->push = ($request->push) ? 1 : 0;
        $reminder->save();  

        return redirect()->route('reminder.index');
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
        
        $user = auth()->user();
        $calculate = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculate->currency)[0];
        $days = [];$alert_days = [];
        for ($i=0; $i < 31; $i++) { 
           array_push($days, $i+1);
        }
        for ($i=0; $i < 15; $i++) { 
           array_push($alert_days, $i+1);
        }
        array_push($alert_days, 20, 25, 30);
        $years = [date('Y'),  date('Y')+1 ];
        $months= ["1"=> "January", "2"=> "Febuary", "3"=> "March","4"=> "April",
                    "5"=> "May", "6"=> "June", "7"=> "July","8"=> "August",
                    "9"=> "Septempber", "10"=> "October", "11"=> "November","12"=> "December"];
        $reminder = Reminder::find($id);   
        $date = ($reminder->date) ? explode('-', $reminder->date) : ['', '', ''] ; 
        $alert = ($reminder->alert) ? explode('-', $reminder->alert) : ['', '', ''] ; 
        
        // var_dump($reminder->alert);return;
        return view('user.reminders.edit_reminder', compact('alert_days','days', 'months', 'years', 'date', 'alert', 'reminder', 'currency'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = auth()->user();

        if ($request->mark == "sygzjsxgvcxbsbdvbvxgvxnbcncff") {
            $reminder = Reminder::findorfail($id);
            $reminder->complete = 1;
            $reminder->save();
            return redirect()->back();
        } else {
            $this->validate($request, ['alert_day'=> 'required','day'=> 'required', 'month' => 'required', 'year' => 'required']);
            $date = "$request->year-$request->month-$request->day";
            $alert = '';
            
            // if($request->alert_year && $request->alert_month && $request->alert_day){
            //     $alert = "$request->alert_year-$request->alert_month-$request->alert_day";
            // }
    
            Validator::extend('before_or_equal', function($attribute, $value, $parameters, $validator) {
                return strtotime($validator->getData()[$parameters[0]]) >= strtotime($value);
                }, 'Date entered is not correct.');
    
            $momment = compact('date', 'alert'); 
            // var_dump($momment); |before_or_equal:datereturn;
            $validator = Validator::make($momment, [
                'date' => 'required|date|after:yesterday',
                'alert' => 'date|before_or_equal:date'
            ], [
                'date.after' => 'Date is not correct',
                'alert.after' => 'Date is not correct',
                'alert.before_or_equal' => 'Date is not correct'
            ])->validate();
            
            $alert = date('Y-m-d', strtotime("-$request->alert_day day", strtotime($date)) );

            $this->validate($request, [
                'reminder'  => 'required|max:50',
                'amount' => 'numeric|min:0'
            ]);
            
            $reminder = Reminder::findorfail($id);
            $reminder->user_id = $user->id;
            $reminder->name = $request->reminder;
            $reminder->date = $date;
            $reminder->note = $request->note;
            $reminder->amount = $request->amount;
            $reminder->alert = $alert;
            $reminder->due = $request->alert_day;
            $reminder->email = ($request->email) ? 1 : 0;
            $reminder->sms = ($request->sms) ? 1 : 0;
            $reminder->push = ($request->push) ? 1 : 0;
            if($reminder->complete == 0) $reminder->save();  
            
    
            return redirect()->route('reminder.index');
        }
        
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
