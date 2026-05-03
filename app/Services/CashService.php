<?php

namespace App\Services;

use App\Enums\SevenGType;
use App\FinicialCalculator as Calculator;
use App\Helpers\ArchiveAccount;
use App\Helpers\GapAccountCalculator as GapAccount;
use App\Helpers\GapExchangeHelper as Exchange;
use App\Models\SevenG\AlphaFin as Alpha;
use App\Models\SevenG\BetaFin as Beta;
use App\Models\SevenG\BespokeKPI;
use App\Models\SevenG\EducationFin as Education;
use App\Models\Wheel\BespokeWheel;
use App\Models\Wheel\CashAccount as Cash;

class CashService
{
    public function getCashList($user, array $filters): array
    {
        ['header' => $header, 'access' => $access, 'account' => $account, 'archive' => $archive, 'kpi' => $kpi] = $filters;

        if ($header) {
            return ArchiveAccount::cashArchiveAction($user, $header, $access, $account, $kpi);
        }

        $calculator = Calculator::where('user_id', $user->id)->first();

        $cash = Cash::where('user_id', $user->id)
            ->where('isArchive', $archive ? 1 : 0)
            ->latest()
            ->get();

        if ($archive) {
            $seveng   = [];
            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency, $archive)['cash'];
        } else {
            $alpha     = Alpha::where('user_id', $user->id)->first();
            $beta      = Beta::where('user_id', $user->id)->first();
            $education = Education::where('user_id', $user->id)->first();

            $alpha     = Exchange::switchToCashAccount($alpha, 'Alpha', $calculator->currency);
            $beta      = Exchange::switchToCashAccount($beta, 'Beta', $calculator->currency);
            $education = Exchange::switchToCashAccount($education, 'Education', $calculator->currency);

            $seveng   = [$alpha, $beta, $education];
            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency)['cash'];
        }

        $cash_detail = GapAccount::calcCashAccount($cash, $user, $archive);

        foreach ($seveng as $money) {
            $money->currency = explode(' ', $money->account_currency)[0];
            $money->chart    = GapAccount::cashDetailChart($money);
        }
        foreach ($cash as $money) {
            $money->currency = explode(' ', $money->account_currency)[0];
            $money->chart    = GapAccount::cashDetailChart($money);
        }
        foreach ($bespokes as $money) {
            $money->currency = explode(' ', $money->account_currency)[0];
            $money->chart    = GapAccount::cashDetailChart($money);
        }

        return compact('cash', 'bespokes', 'cash_detail', 'seveng');
    }

    public function storeCash($user, $request): array
    {
        $cash                   = new Cash();
        $cash->user_id          = $user->id;
        $cash->automated        = $request->automated_rate;
        $cash->account_name     = $request->name;
        $cash->account_type     = $request->cash;
        $cash->account_purpose  = $request->purpose;
        $cash->account_details  = $request->details;
        $cash->account_location = $request->fund;
        $cash->account_currency = $request->currency;
        $cash->target           = $request->target;
        $cash->current          = $request->current;
        $cash->target_date      = $request->target_date;
        $cash->isAnalytics      = ($request->analytics === 'true') ? 1 : 0;
        $cash->save();

        $this->refreshTiles($user);

        return ['cash' => $cash];
    }

    public function updateCash($user, $request, int $id): array
    {
        $cash = null;

        if ($request->seveng) {
            $cash = $this->updateSevenGCash($user, $request);
        } elseif ($request->account) {
            $cash = $this->updateBespokeCash($user, $request);
        } else {
            $cash = Cash::where('user_id', $user->id)->where('id', $id)->firstOrFail();
            $cash->account_details  = $request->details;
            $cash->automated        = $request->automated_rate;
            $cash->target           = $request->target;
            $cash->current          = $request->current;
            $cash->target_date      = $request->target_date;
            $cash->account_location = $request->account_location;
            $cash->account_type     = $request->type;
            $cash->account_alias    = $request->alias;
            $cash->isAnalytics      = ($request->analytics === 'true') ? 1 : 0;
            $cash->save();
        }

        $this->refreshTiles($user);

        return ['cash' => $cash];
    }

    private function updateSevenGCash($user, $request): mixed
    {
        $calculator = Calculator::where('user_id', $user->id)->first();

        $seveng = match ($request->seveng) {
            SevenGType::ALPHA => tap(Alpha::where('user_id', $user->id)->first(), function () use ($request, $calculator) {
                $calculator->extra_save = $request->current;
                $calculator->save();
            }),
            SevenGType::BETA      => Beta::where('user_id', $user->id)->first(),
            SevenGType::EDUCATION => Education::where('user_id', $user->id)->first(),
            default               => null,
        };

        if ($seveng) {
            $seveng->account_details  = $request->details;
            $seveng->target           = $request->target;
            $seveng->current          = $request->current;
            $seveng->target_date      = $request->target_date;
            $seveng->account_location = $request->account_location;
            $seveng->save();
        }

        return $seveng;
    }

    private function updateBespokeCash($user, $request): mixed
    {
        if ($request->account !== SevenGType::BESPOKE) {
            return null;
        }

        $bespoke = BespokeKPI::where('user_id', $user->id)->where('id', $request->bespoke)->first();
        $wheel   = BespokeWheel::where('bespoke_id', $bespoke?->id)->first();

        if ($bespoke) {
            $bespoke->kpi_details  = $request->details;
            $bespoke->target       = $request->target;
            $bespoke->current      = $request->current;
            $bespoke->cash_keptin  = $request->type;
            $bespoke->isAnalytics  = ($request->analytics === 'true') ? 1 : 0;
            $wheel->account_alias  = $request->alias;
            $wheel->target_date    = $request->target_date;
            $wheel->fund           = $request->account_location;
            $bespoke->save();
            $wheel->save();
        }

        return $bespoke;
    }

    private function refreshTiles($user): void
    {
        $mycash      = Cash::where('user_id', $user->id)->latest()->get();
        $cash_items  = Cash::where('user_id', $user->id)->count();
        $cash_detail = GapAccount::calcCashAccount($mycash, $user);
        GapAccount::saveUpdatedTiles($user, 'cash', $cash_items + 3, $cash_detail['sum']);
    }
}
