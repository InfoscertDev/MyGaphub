<?php

namespace App\Services;

use App\Helpers\AllocationHelpers;
use App\Helpers\ArchiveAccount;
use App\Helpers\GapAccountCalculator as GapAccount;
use App\User;
use App\Models\Wheel\PensionAccount as Pension;

class RetirementService
{
    const MAX_PENSION_ACCOUNTS = 12;

    public function getRetirementList($user, array $filters)
    {
        $header  = isset($filters['header'])  ? $filters['header']  : null;
        $access  = isset($filters['access'])  ? $filters['access']  : null;
        $account = isset($filters['account']) ? $filters['account'] : null;
        $archive = isset($filters['archive']) ? $filters['archive'] : null;

        if ($header) {
            return ArchiveAccount::pensionArchiveAction($user, $header, $access, $account);
        }

        $retirements = Pension::where('user_id', $user->id)
                            ->where('isArchive', $archive ? 1 : 0)
                            ->latest()
                            ->get();

        $profile      = $user->user_profile;
        $dob          = $profile->date_of_birth ?? null;
        // $retirement   = null;

        $average_seed = AllocationHelpers::averageSeedDetail($user)['average_seed'];
        $retirement   = GapAccount::pensionPOT($retirements, $dob, $average_seed);

        $retirement_detail = GapAccount::calcPensionAccount($retirements, $user);
        $backgrounds       = GapAccount::accountBackground();

        return compact('retirement', 'retirement_detail', 'backgrounds');
    }

    public function storeRetirement($user, $request): array
    {
        $pension_items = Pension::where('user_id', $user->id)->count();

        if ($pension_items > self::MAX_PENSION_ACCOUNTS) {
            return [
                'success' => false,
                'message' => "You can't add more than 12 Pension Accounts."
            ];
        }

        $user    = User::find($user->id);
        $profile = $user->profile;

        if ($request->dob && !$profile->date_of_birth) {
            $profile->date_of_birth = $request->dob;
            $profile->dob_count     = $profile->dob_count + 1;
            $profile->save();
        }

        $pension                       = new Pension();
        $pension->user_id              = $user->id;
        $pension->name                 = $request->pension_name;
        $pension->pension_type         = $request->pension_type;
        $pension->provider             = $request->pension_provider;
        $pension->current              = $request->current;
        // $pension->assured_income       = $request->assured_income;
        $pension->percentage_cos       = 0;
        $pension->monthly_contribution = $request->monthly_cont;
        $pension->retirement_age       = $request->retire_age;
       // Auto-calculated on creation — not taken from request
        $pension->assured_income = $this->calcAssuredIncome(
            (int) $request->current,
            (int) $request->monthly_cont
        );

        $pension->save();

        $this->refreshTiles($user);

        return ['success' => true, 'pension' => $pension];
    }

    public function updateRetirement($user, $request, int $id): Pension
    {
        $pension = Pension::where('user_id', $user->id)
                          ->where('id', $id)
                          ->firstOrFail();

        $pension->name                 = $request->pension_name;  // added
        $pension->provider             = $request->provider;
        $pension->current              = $request->current;       // added
        $pension->monthly_contribution = $request->monthly;
        $pension->retirement_age       = $request->retirement;
        // assured_income is auto-calculated from current balance + monthly contribution
        // Formula: standard annuity rate (4%) applied to projected pot
        // Users cannot manipulate this — it is always derived from pension data
        $pension->assured_income = $this->calcAssuredIncome(
            $request->current,
            $request->monthly
        );

        $pension->save();

        $this->refreshTiles($user);

        return $pension;
    }

    /**
     * Auto-calculate assured income from pension data.
     * Formula: 4% annuity rate applied to (current + monthly contribution)
     * This prevents users from manipulating retirement projections manually.
     * Rate can be adjusted here centrally without touching any other logic.
     */
    private function calcAssuredIncome(int $current, int $monthly): float
    {
        $annuity_rate = 0.04; // 4% standard annuity rate — adjust here if needed

        return round(($current + $monthly) * $annuity_rate, 2);
    }

    private function refreshTiles($user): void
    {
        $myaccount      = Pension::where('user_id', $user->id)->latest()->get();
        $account_items  = Pension::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcPensionAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'retirement', $account_items, $account_detail['sum']);
    }
}