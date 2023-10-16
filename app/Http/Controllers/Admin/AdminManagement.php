<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin as Admin;
use App\AdminConfiguration as Configration;
use App\Asset\GapCurrency;
use App\Helper\HelperClass;
use App\Models\LoginAttemptLog;

class AdminManagement extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin.home');
        // return view('admin.coming-soon');
    }


    public function report()
    {
        return view('admin.coming-soon');
    }

    public function index()
    {
        $admins = Admin::latest()->paginate(10);

        return view('admin.people.admins', compact('admins'));
    }

    public function reportLogin()
    {
        $logins = LoginAttemptLog::latest()->paginate(10);

        return view('admin.reports.logins', compact('logins'));
    }


    public function exchange()
    {
        $currency = "€ EUR";
        $system_currencies = GapCurrency::where('user_id', 0)->first();
        $currencies = HelperClass::popularCurrenciensInfo();
        $configrations = Configration::first();

        // var_dump($configrations); return;
        return view('admin.reports.exchange', compact('system_currencies', 'currencies','currency', 'configrations'));
    }


    public function preferenceEmail(Request $request){
        $this->validate($request, [
            'preference_email' => 'required|email'
        ]);
        $configrations = Configration::first();
        $configrations->exchange_email = $request->preference_email;
        $configrations->save();

        return redirect()->back()->with(['success' => "Prefeence Email updated"]);
    }
}
