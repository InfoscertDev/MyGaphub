<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignSeedIncomeRequest;
use App\Http\Requests\StoreSeedBudgetRequest;
use App\Http\Requests\StoreSeedRequest;
use App\Services\SeedService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SeedController extends Controller
{
    use ApiResponse;

    public function __construct(private SeedService $seedService) {}

    // -------------------------------------------------------------------------
    // Seed Overview
    // -------------------------------------------------------------------------

    public function index(Request $request): JsonResponse
    {
        $data = $this->seedService->getSeedOverview(
            $request->user(),
            $request->input('preview')
        );

        return $this->success($data, 'Seed information retrieved successfully.');
    }

    public function target(Request $request): JsonResponse
    {
        $data = $this->seedService->getTargetSeed(
            $request->user(),
            $request->input('clone')
        );

        return $this->success($data, 'Seed future information retrieved successfully.');
    }

    // -------------------------------------------------------------------------
    // Period History
    // -------------------------------------------------------------------------

    public function periodHistory(Request $request, string $period): JsonResponse
    {
        $data = $this->seedService->getPeriodHistory($request->user(), $period);

        return $this->success($data, 'Period history retrieved successfully.');
    }

    public function periodHistoryDifferences(Request $request, string $period): JsonResponse
    {
        $data = $this->seedService->getPeriodDifferences($request->user(), $period);

        return $this->success($data, 'Period differences retrieved successfully.');
    }

    public function monthlySeedReport(Request $request, string $period): JsonResponse
    {
        $data = $this->seedService->getMonthlySeedReport($request->user(), $period);

        return $this->success($data, 'Monthly seed report retrieved successfully.');
    }

    public function periodHistoryReport(Request $request, string $period, string $seed): JsonResponse
    {
        $data = $this->seedService->getPeriodHistoryReport(
            $request->user(),
            $period,
            $seed,
            $request->input('label'),
            $request->input('category')
        );

        return $this->success($data, 'Period history report retrieved successfully.');
    }

    // -------------------------------------------------------------------------
    // Budget Management
    // -------------------------------------------------------------------------

    public function storeBudget(StoreSeedBudgetRequest $request): JsonResponse
    {
        $set = $this->seedService->setSeedBudget($request->user(), $request);

        if (!$set) {
            return $this->error(
                'Your set amount is lower than the sum of your allocated SEED.',
                [],
                422
            );
        }

        return $this->success([], 'Seed budget amount has been set.');
    }

    public function assignIncome(AssignSeedIncomeRequest $request): JsonResponse
    {
        $this->seedService->assignSeedIncome($request->user(), $request);

        return $this->success([], 'Income assigned to seed successfully.');
    }

    public function store(StoreSeedRequest $request): JsonResponse
    {
        $this->seedService->storeSeed($request->user(), $request);

        $message = $request->category === 'expenditure'
            ? 'Expenditure budget has been updated.'
            : 'Discretionary budget has been updated.';

        return $this->success([], $message);
    }
}
