<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FinicialCalculator as Calculator;
use App\FinicialQuestion as Question;

use App\User;
use App\Helper\HelperClass;
use App\Helper\WheelClass as Wheel;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\CalculatorClass as Fin;
use App\Helper\GapExchangeHelper;
use App\Helper\IntegrationParties;
use App\Helper\PersonalAssistance;
use App\UserProfile as Profile;
use App\UserAudit as Audit;
use App\Helper\AnalyticsClass as SevenG;
use App\Models\Notification;
use Carbon\Carbon;
use App\Helper\AllocationHelpers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function notifications(){
        $user = auth()->user();
        $notifications = Notification::where('user_id', $user->id)->latest()->paginate(10);
        foreach ($notifications as $note) {
            // $note->created_at = Carbon::parse($note->created_at)->diffForHumans();
            if(!$note->seen) $note->seen = 1; $note->save();
        }
        return view('user.notifications', compact('notifications'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user =  auth()->user();
        $profile = Profile::find($user->profile_id);
        $quest = Question::where('user_id', $user->id)->first();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $fin =  Fin::finicial($user);
        $day = date('d');
        $great = HelperClass::greating()[$day];
        $audit = Audit::where('user_id', $user->id)->first();
        $tiles = HelperClass::dashboardTiles();

        if(!$audit){
            $audit = new Audit();
            $audit->user_id = $user->id;
            $user->dashboard = json_encode($tiles);
            $audit->save();
        }
        if(!$audit->dashboard){
            $audit->dashboard = json_encode($tiles);
            $audit->save();
            return redirect('/home');
        }

        $residential = null;  $dashboard = json_decode($audit->dashboard);
        $net_detail = null; $average_detail = null;
        $backgrounds = Wheel::equityDetails($user)['backgrounds'];
        $seveng = [];

        if ($fin['saving'] == 0 && $fin['cost'] == 0) {
            $currencies = HelperClass::popularCurrenciens();
            $currency = explode(" ", $calculator->currency)[0];
            return view('guest.calculator', compact('currencies', 'user', 'calculator', 'currency'));
        }else if (!$quest->step1 || !$quest->step2 || !$quest->step3 || !$quest->step4) {
            return view('auth.registerquest');
        } else{
            GapExchangeHelper::gapCurrencies($user);
            $personal = new PersonalAssistance($user);
            $assistance = $personal->assistance();

            // info([$assistance['acquisition']['asset']]);
            $currency = explode(" ", $calculator->currency)[0];
            $snap = Fin::snapshot($fin['calculator'], $fin['cost']);
            $residential = Wheel::primaryEquityDetails($user);
            $net_detail = GapAccount::homeNetWorth($user);
            $average_detail = Fin::averageSeedDetail($user);
            $average_detail = AllocationHelpers::averageSeedDetail($user)['average_seed'];
            $seveng = SevenG::seveng_steps($user)['seveng'];

            $seed_backgrounds = Fin::accountBackground();
            $net_backgrounds = ['#00ff00', '#ff0000', '#0000ff'];
            $user = User::find($user->id);

            if (!$profile) {
                $profile = new Profile(); $profile->save();
                $user->profile_id  = $profile->id;
                $user->save();
                return redirect('/home');
            }

            return view('home',
                    compact('user','profile' ,'fin', 'currency', 'snap', 'great', 'backgrounds',
                            'seveng', 'dashboard', 'average_detail','residential', 'net_detail',
                            'net_backgrounds', 'seed_backgrounds', 'assistance'));
        }
    }

    public function dashboardTiles(Request $request){
        $user = auth()->user();
        $this->validate($request, []);

        $tiles =  [
            'equity' => ($request->equity) ? true : false,
            'net_worth' => ($request->net_worth) ? true : false,
            'average_seed' => ($request->average_seed) ? true : false,
            'grand' => ($request->grand) ? true : false,
            'freedom' => ($request->freedom) ? true : false,
            'education' => ($request->education) ? true : false,
            'debt' => ($request->debt) ? true : false,
            'credit' => ($request->credit) ? true : false,
            'beta' => ($request->beta) ? true : false,
            'alpha' => ($request->alpha) ? true : false,
        ];
        $audit = Audit::where('user_id', $user->id)->first();
        $audit->dashboard = json_encode($tiles);
        $audit->save();

        return redirect('/home')->with(['success'=> 'Dashboard Tiles has been set successfully.']);
    }

    public function questions(Request $request){
        $user = auth()->user();
        $this->validate($request, [
            'step1' => 'required',
            'step2' => 'required',
            'step3' => 'required',
            'step4' => 'required',
            'step5' => 'required',
            'step6' => 'required',
            'step7' => 'required',
        ]);

        $question = Question::where('user_id', $user->id)->first();
        $question->step1 =  $request->step1;
        $question->step2 =  $request->step2;
        $question->step3 =  $request->step3;
        $question->step4 =  $request->step4;
        $question->step5 =  $request->step5;
        $question->step6 =  $request->step6;
        $question->step7 =  $request->step7;
        $question->save();
        IntegrationParties::migrate_sendinblue_to_prospect($user);
        return redirect('/home/7g');
    }
}
