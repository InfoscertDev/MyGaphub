<?php

namespace App\Services;

use App\FinicialCalculator as Calculator;
use App\Helpers\CalculatorClass as Fin;
use App\Helpers\GapAccountCalculator as GapAccount;

class RoiService
{
    public function getRoiStatus($user): array
    {
        $fin             = Fin::finicial($user);
        $improve_status  = [
            'seed_type'     => $fin['seed_type'],
            'monthly_asset' => $fin['cost'],
            'saving'        => $fin['saving'],
            'portfolio'     => $fin['portfolio'],
            'roce'          => $fin['roce'],
            'investment'    => $fin['investment'],
        ];

        $roi_detail = GapAccount::calcRoiInvestment($improve_status);

        return compact('improve_status', 'roi_detail');
    }

    public function updateRoi($user, $request): Calculator
    {
        $calculator             = Calculator::where('user_id', $user->id)->firstOrFail();
        $calculator->extra      = $request->seed_type;
        $calculator->roce       = $request->roce;
        $calculator->investment = $request->investment;
        $calculator->save();

        return $calculator;
    }
}
