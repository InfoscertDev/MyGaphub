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
            'average_seed'  => $fin['seed']['total'] ?? 0,
            'average_expenditure'  => $fin['averageExpenditure']['total'] ?? 0,
        ];

        $roi_detail = GapAccount::calcRoiInvestment($improve_status);

        return compact('improve_status', 'roi_detail');
    }

    public function updateRoi($user, $request): Calculator
    {
        $calculator = Calculator::where('user_id', $user->id)->firstOrFail();

        if ($request->filled('seed_type')) {
            $calculator->extra = $request->seed_type;
        }

        if ($request->filled('roce')) {
            $calculator->roce = $request->roce;
        }

        if ($request->filled('investment')) {
            $calculator->investment = $request->investment;
        }

        $calculator->save();

        return $calculator;
    }
}
