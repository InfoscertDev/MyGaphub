<?php

namespace App\Services;

use App\Helpers\GapAccountCalculator as GapAccount;
use App\Helpers\GapExchangeHelper as Exchange;
use App\SevenG\DeptFin as Debt;
use App\Wheel\HomeEquity;
use App\Wheel\MortgageAccount as Mortgage;

class EquityService
{
    public function getEquityInfo($user): mixed
    {
        return Exchange::availabeleMortgages($user);
    }

    public function getEquityList($user, bool $archive): array
    {
        $equity = HomeEquity::where('user_id', $user->id)
            ->where('isArchive', $archive ? 1 : 0)
            ->latest()
            ->get();

        $equity_detail = GapAccount::calcEquityAccount($equity, $user);

        foreach ($equity as $eq) {
            $eq->mortgage;
            $balance         = $eq->mortgage ? $eq->mortgage->current_balance : 0;
            $marketValue     = $eq->market_value > 0 ? $eq->market_value : 1;
            $eq->equity      = $eq->market_value - $balance;
            $eq->ownership   = round($eq->equity * 100 / $marketValue);
            $eq->per_mortgage = round(($balance / $marketValue) * 100);
            $eq->chart        = [
                'labels'      => ['Mortgage', 'Home Equity'],
                'values'      => [$balance, $eq->equity],
                'percentages' => [$eq->per_mortgage, $eq->ownership],
            ];
        }

        return compact('equity', 'equity_detail');
    }

    public function storeEquity($user, $request): HomeEquity
    {
        $equity               = new HomeEquity();
        $equity->user_id      = $user->id;
        $equity->location     = $request->location;
        $equity->zip_code     = $request->zip_code;
        $equity->market_value = $request->market_value;
        $equity->ismortgage   = $request->ismortgage;
        $equity->country      = $request->country;
        $equity->mortgage_id  = $request->mortgage;
        $equity->save();

        $this->linkMortgage($user, $request, $equity);

        return $equity;
    }

    public function updateEquity($user, $request, int $id): HomeEquity
    {
        $equity                = HomeEquity::where('user_id', $user->id)->where('id', $id)->firstOrFail();
        $equity->market_value  = $request->market_value;
        $equity->date_acquired = $request->date_acquired;
        $equity->save();

        return $equity;
    }

    private function linkMortgage($user, $request, HomeEquity $equity): void
    {
        if ((int) $request->mortgage === -1 && $request->ismortgage) {
            $debt            = Debt::where('user_id', $user->id)->first();
            $debt->equity_id = $equity->id;
            $debt->save();
        }

        if ((int) $request->mortgage > 0 && $request->ismortgage) {
            $mortgage            = Mortgage::find($request->mortgage);
            $mortgage->equity_id = $equity->id;
            $mortgage->save();
        }
    }
}
