<?php

namespace App\Services;

use App\UserAudit as Audit;
use App\FinicialCalculator as Calculator;
use App\Helper\GapAccountCalculator as GapAccount;

class NetWorthService
{
    public function getNetWorth($user): array
    {
        $calculator = Calculator::where('user_id', $user->id)->firstOrFail();
        $currency   = explode(' ', $calculator->currency)[0];
        $net        = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        $backgrounds = ['#00ff00', '#ff0000', '#0000ff'];

        Audit::firstOrCreate(['user_id' => $user->id]);

        $isNet = Audit::where('user_id', $user->id)->select('net_confirm')->first();

        return compact('currency', 'isNet', 'net_detail', 'net', 'backgrounds');
    }

    public function confirmNetWorth($user): void
    {
        $audit = Audit::where('user_id', $user->id)->firstOrFail();
        $audit->net_confirm = 1;
        $audit->save();
    }
}
