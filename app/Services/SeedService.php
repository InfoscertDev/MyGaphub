<?php

namespace App\Services;

use App\Asset\PortfoloAssetRecord;
use App\Asset\SeedBudget as Budget;
use App\DiscretionaryBudget as Philantrophy;
use App\Enums\SeedToken;
use App\FinicialCalculator as Calculator;
use App\Helper\AllocationHelpers;
use App\Helper\CalculatorClass;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\WheelClass as Wheel;
use App\ILab;
use App\Models\Asset\NonPortfolioRecord;
use App\Models\Asset\RecordBudgetSpent;
use App\Models\Asset\SeedBudgetAllocation;
use App\SevenG\GrandFin as Grand;
use App\Wheel\CashAccount as Cash;
use App\Wheel\IncomeAccount as Income;
use Carbon\Carbon;

class SeedService
{
    // -------------------------------------------------------------------------
    // Seed Overview
    // -------------------------------------------------------------------------

    public function getSeedOverview($user, ?string $preview): array
    {
        $current_seed = CalculatorClass::getCurrentSeed($user);
        $target_seed  = CalculatorClass::getTargetSeed($user);

        // Handle rollover preview confirmation
        if ($preview === SeedToken::PREVIEW) {
            $current_seed->priviewed = 1;
            $current_seed->save();
        }

        $historic_seed   = AllocationHelpers::averageSeedDetail($user)['historic_seed'];
        $periods         = AllocationHelpers::averageSeedDetail($user)['periods'];
        $backgrounds     = array_reverse(GapAccount::accountBackground());
        $current_detail  = AllocationHelpers::getAllocatedSeedDetail($user);
        $target_detail   = AllocationHelpers::getAllocatedSeedDetail($user, 'target');
        $average_detail  = AllocationHelpers::averageSeedDetail($user)['average_seed'];
        $average_seed    = CalculatorClass::getAverageSeed($user);

        $incomes = Income::where('user_id', $user->id)
            ->where('isArchive', 0)
            ->orderBy('income_date', 'DESC')
            ->get();

        $total_assigned = array_sum(array_column($incomes->toArray(), 'assigned_income'));

        AllocationHelpers::monthlyRecurssionChecker($user);

        return compact(
            'average_detail',
            'current_detail',
            'target_detail',
            'current_seed',
            'target_seed',
            'periods',
            'historic_seed',
            'backgrounds',
            'total_assigned'
        );
    }

    public function getTargetSeed($user, ?string $clone): array
    {
        $target_seed   = CalculatorClass::getTargetSeed($user, $clone);
        $target_detail = AllocationHelpers::getAllocatedSeedDetail($user, 'target');

        return compact('target_seed', 'target_detail');
    }

    // -------------------------------------------------------------------------
    // Period History
    // -------------------------------------------------------------------------

    public function getPeriodHistory($user, string $period): array
    {
        $period_end    = Carbon::createFromFormat('Y-m-d', $period)->endOfMonth()->format('Y-m-d');
        $monthly_seed  = AllocationHelpers::monthlySeedDetail($user, $period);

        $allocations = SeedBudgetAllocation::where('user_id', $user->id)
            ->whereBetween('period', [$period, $period_end])
            ->get();

        $ids          = array_values(array_column($allocations->toArray(), 'id'));
        $record_spend = RecordBudgetSpent::where('user_id', $user->id)
            ->whereIn('allocation_id', $ids)
            ->get();

        $record_seed = array_sum(array_column($record_spend->toArray(), 'amount'));

        return compact('monthly_seed', 'record_seed');
    }

    public function getPeriodDifferences($user, string $period): array
    {
        $periods    = AllocationHelpers::averageSeedDetail($user)['periods'];
        $period_end = date('Y-m-t', strtotime($period));

        $budget = SeedBudgetAllocation::where('user_id', $user->id)
            ->whereBetween('period', [$period, $period_end])
            ->get();

        $allocations = $budget->map(function ($allocation) use ($user) {
            $allocation->actual = RecordBudgetSpent::where('user_id', $user->id)
                ->where('allocation_id', $allocation->id)
                ->sum('amount');
            return $allocation;
        })->values()->all();

        return compact('periods', 'allocations');
    }

    // -------------------------------------------------------------------------
    // Monthly Seed Report
    // -------------------------------------------------------------------------

    public function getMonthlySeedReport($user, string $period): array
    {
        $calculator  = Calculator::where('user_id', $user->id)->first();
        $currency    = explode(' ', $calculator->currency)[0];
        $period_end  = date('Y-m-t', strtotime($period));
        $periods     = AllocationHelpers::averageSeedDetail($user)['periods'];

        $allocations  = SeedBudgetAllocation::where('user_id', $user->id)
            ->whereBetween('period', [$period, $period_end])
            ->get();

        $total_budget = array_sum(array_column($allocations->toArray(), 'amount'));
        $ids          = array_column($allocations->toArray(), 'id');

        $record_spend = RecordBudgetSpent::where('user_id', $user->id)
            ->whereIn('allocation_id', $ids)
            ->get();

        $total_actual = array_sum(array_column($record_spend->toArray(), 'amount'));

        $savings_allocations      = $this->getCategoryAllocations($user, 'savings', $period, $period_end);
        $expenditure_allocations  = $this->getCategoryAllocations($user, 'expenditure', $period, $period_end);
        $education_allocations    = $this->getCategoryAllocations($user, 'education', $period, $period_end);
        $discretionary_allocations = $this->getCategoryAllocations($user, 'discretionary', $period, $period_end);

        return compact(
            'currency',
            'periods',
            'total_budget',
            'total_actual',
            'savings_allocations',
            'expenditure_allocations',
            'education_allocations',
            'discretionary_allocations'
        );
    }

    private function getCategoryAllocations($user, string $category, string $period, string $period_end)
    {
        $allocations = SeedBudgetAllocation::where('seed_category', $category)
            ->where('user_id', $user->id)
            ->whereBetween('period', [$period, $period_end])
            ->latest()
            ->limit(3)
            ->get();

        foreach ($allocations as $allocation) {
            $allocation->actual = RecordBudgetSpent::where('user_id', $user->id)
                ->where('allocation_id', $allocation->id)
                ->sum('amount');
        }

        return $allocations;
    }

    // -------------------------------------------------------------------------
    // Period History Report
    // -------------------------------------------------------------------------

    public function getPeriodHistoryReport($user, string $period, string $seed, ?string $label, ?string $category): array
    {
        $period_end  = Carbon::createFromFormat('Y-m-d', $period)->endOfMonth()->format('Y-m-d');
        $periods     = AllocationHelpers::averageSeedDetail($user)['periods'];
        $seeds       = ['savings', 'expenditure', 'education', 'discretionary'];
        $valid_cats  = ['accommodation', 'transportation', 'family', 'utilities', 'debt_repayment'];
        $category    = in_array($category, $valid_cats) ? $category : null;
        $label_report = [];
        $labels       = [];

        if ($seed === 'expenditure' && !$category) {
            return $this->getExpenditureGroups($user, $period, $periods, $seed);
        }

        if (!in_array($seed, $seeds)) {
            return [];
        }

        if ($label) {
            [$allocations, $label_report, $labels] = $this->getLabelledAllocations($user, $seed, $label, $period, $period_end);
        } else {
            $allocations = $this->getUnlabelledAllocations($user, $seed, $period, $category);
        }

        return compact('allocations', 'periods', 'period', 'seed', 'label', 'label_report', 'labels');
    }

    private function getExpenditureGroups($user, string $period, array $periods, string $seed): array
    {
        $allocations = SeedBudgetAllocation::where('seed_category', 'expenditure')
            ->where('user_id', $user->id)
            ->where('period', $period)
            ->get();

        $groups = [];
        $labels = [];

        foreach ($allocations->toArray() as $allocation) {
            $labels[] = $allocation['expenditure'];
            $groups[$allocation['expenditure']]['label']    = $allocation['expenditure'];
            $groups[$allocation['expenditure']]['amount'][] = $allocation['amount'];
        }

        $allocations = array_values($groups);

        return compact('allocations', 'periods', 'period', 'seed', 'labels');
    }

    private function getLabelledAllocations($user, string $seed, string $label, string $period, string $period_end): array
    {
        $allocations = SeedBudgetAllocation::where('user_id', $user->id)
            ->where('seed_category', $seed)
            ->where('label', $label)
            ->whereBetween('period', [$period, $period_end])
            ->get();

        $label_report = [];

        foreach ($allocations as $allocation) {
            $label_report[$allocation->period][] = $allocation;
        }

        $labels = array_keys($label_report);

        foreach ($label_report as $key => $items) {
            $ids    = array_values(array_column($items, 'id'));
            $amount = array_sum(array_column($items, 'amount'));

            $actual = RecordBudgetSpent::where('user_id', $user->id)
                ->whereIn('allocation_id', $ids)
                ->sum('amount');

            $label_report[$key] = ['budget' => $amount, 'actual' => $actual];
        }

        return [$allocations, $label_report, $labels];
    }

    private function getUnlabelledAllocations($user, string $seed, string $period, ?string $category)
    {
        $allocations = SeedBudgetAllocation::where('seed_category', $seed)
            ->where('user_id', $user->id)
            ->where('period', $period)
            ->when($category, fn ($q) => $q->where('expenditure', $category))
            ->latest()
            ->get();

        foreach ($allocations as $allocation) {
            $spent             = RecordBudgetSpent::whereAllocationId($allocation->id)->get();
            $allocation->actual = array_sum(array_column($spent->toArray(), 'amount'));
        }

        return $allocations;
    }

    // -------------------------------------------------------------------------
    // Budget Management
    // -------------------------------------------------------------------------

    public function setSeedBudget($user, $request): bool
    {
        $isTarget       = ($request->period === 'seed_future_budget') ? 'target' : 'current';
        $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);
        $available      = $request->budget - $current_detail['total'];
        $isOverride     = ($request->seed === SeedToken::OVERRIDE);

        if ($available < 0 && !$isOverride) {
            return false;
        }

        $seed                = ($isTarget === 'target')
            ? CalculatorClass::getTargetSeed($user)
            : CalculatorClass::getCurrentSeed($user);

        $seed->budget_amount = $request->budget;
        $seed->priviewed     = 1;
        $seed->update();

        return true;
    }

    public function assignSeedIncome($user, $request): void
    {
        $income = Income::where('user_id', $user->id)
            ->where('id', $request->seed_income)
            ->firstOrFail();

        if ($income->income_type === 'non_portfolio') {
            NonPortfolioRecord::where('user_id', $user->id)
                ->where('income_id', $income->id)
                ->update(['seed_budget' => $request->seed_budget]);
        } else {
            PortfoloAssetRecord::where('user_id', $user->id)
                ->where('portfolio_asset_id', $income->id)
                ->update(['seed_budget' => $request->seed_budget]);
        }
    }

    public function storeSeed($user, $request): void
    {
        $seed = match ($request->session) {
            SeedToken::CURRENT => CalculatorClass::getCurrentSeed($user),
            SeedToken::TARGET  => CalculatorClass::getTargetSeed($user),
            default            => null,
        };

        if (!$seed) return;

        if ($request->category === 'expenditure') {
            $seed->accomodation = $request->accomodation;
            $seed->mobility     = $request->mobility;
            $seed->expenses     = $request->expenses;
            $seed->utilities    = $request->utilities;
            $seed->debt_repay   = $request->debt_repay;
        }

        if ($request->category === 'discretionary') {
            $seed->charity              = $request->charity;
            $seed->family_support       = $request->family_support;
            $seed->personal_commitments = $request->personal_commitments;
            $seed->others               = $request->others;
        }

        $seed->update();
    }

    // -------------------------------------------------------------------------
    // Expenditure & Philanthropy
    // -------------------------------------------------------------------------

    public function getExpenditure($user): array
    {
        $fin                 = CalculatorClass::finicial($user);
        $expenditure         = $fin['calculator'];
        $expenditure_detail  = AllocationHelpers::averageSeedExpenditure($user);

        return compact('expenditure', 'expenditure_detail');
    }

    public function getPhilanthropy($user): array
    {
        $grand       = Grand::where('user_id', $user->id)->first();
        $philantrophy = Philantrophy::where('user_id', $user->id)->first();

        if (!$philantrophy) {
            GapAccount::initUserChartity($user);
            $philantrophy = Philantrophy::where('user_id', $user->id)->first();
        }

        $philantrophy_detail = AllocationHelpers::averageSeedPhilantrophy($user);

        return compact('philantrophy', 'grand', 'philantrophy_detail');
    }

    public function savePhilanthropy($user, $request): array
    {
        $grand  = Grand::where('user_id', $user->id)->first();
        $giving = array_sum([$request->charity, $request->family_support, $request->personal, $request->others]);

        if ($giving !== (float) $grand->current) {
            return ['success' => false, 'grand_current' => $grand->current];
        }

        $philantrophy = Philantrophy::where('user_id', $user->id)->first()
            ?? GapAccount::initUserChartity($user);

        $philantrophy->charity              = $request->charity;
        $philantrophy->family_support       = $request->family_support;
        $philantrophy->personal_commitments = $request->personal;
        $philantrophy->others               = $request->others;
        $philantrophy->allocated            = 1;
        $philantrophy->save();

        Wheel::updateGivingTile($user);

        return ['success' => true, 'philantrophy' => $philantrophy];
    }

    // -------------------------------------------------------------------------
    // ILab
    // -------------------------------------------------------------------------

    public function getILab($user): array
    {
        $calculator  = Calculator::where('user_id', $user->id)->first();
        $currency    = explode(' ', $calculator->currency)[0];
        $year        = (int) date('Y') + 1;

        $ilab = ILab::firstOrCreate(['user_id' => $user->id, 'other' => $year]);

        $cash         = Cash::where('user_id', $user->id)->latest()->get();
        $ilab_data    = GapAccount::currentILab($user, $cash);
        $current_ilab = $ilab_data['current_ilab'];
        $current_info = $ilab_data['ilabs'];
        $target_info  = GapAccount::targetedILab($ilab)['ilabs'];

        return compact('ilab', 'current_info', 'target_info', 'current_ilab', 'currency');
    }

    public function storeILab($user, $request): ILab
    {
        $year = (int) date('Y') + 1;
        $ilab = ILab::where('user_id', $user->id)->where('other', $year)->firstOrFail();

        $ilab->investment       = $request->investment;
        $ilab->equity           = $request->equity;
        $ilab->savings          = $request->savings;
        $ilab->credit           = $request->credit;
        $ilab->mortgage         = $request->mortgage;
        $ilab->non_portfolio    = $request->non_portfolio;
        $ilab->asset_portfolio  = $request->portfolio;
        $ilab->periodic_savings = $request->periodic_savings;
        $ilab->education        = $request->education;
        $ilab->expenditure      = $request->expenditure;
        $ilab->discretionary    = $request->discretionary;
        $ilab->save();

        return $ilab;
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    public static function formatExpenditureLabel(string $value): string
    {
        return match ($value) {
            'family'          => 'Home & Family',
            'debt_repayment'  => 'Debt Repayment',
            default           => ucfirst($value),
        };
    }
}
