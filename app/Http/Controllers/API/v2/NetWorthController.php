<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FinicialCalculator as Calculator;
use App\UserAudit as Audit;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\GapExchangeHelper as Exchange;

class NetWorthController extends Controller
{
    /**
     * Get net worth data for the authenticated user.
     */
    public function netWorth(Request $request)
    {
        $user       = $request->user();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency   = explode(' ', $calculator->currency)[0];
        $net        = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        $backgrounds = ['#00ff00', '#ff0000', '#0000ff'];

        $audit = Audit::firstOrCreate(['user_id' => $user->id]);

        $isNet = Audit::where('user_id', $user->id)->select('net_confirm')->first();

        return response()->json([
            'status'  => true,
            'data'    => compact('currency', 'isNet', 'net_detail', 'net', 'backgrounds'),
            'message' => 'Net worth retrieved successfully.',
        ]);
    }

    /**
     * Confirm net worth for the authenticated user.
     */
    public function storeNetWorth(Request $request)
    {
        $user  = $request->user();
        $isNet = Audit::where('user_id', $user->id)->firstOrFail();

        $isNet->net_confirm = 1;
        $isNet->save();

        return response()->json([
            'status'  => true,
            'data'    => [],
            'message' => 'Net worth confirmed successfully.',
        ]);
    }
}