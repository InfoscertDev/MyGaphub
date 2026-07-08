<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActionStrategyRequest;
use App\Http\Requests\StoreActionStrategyItemsRequest;
use App\Http\Requests\StoreActionStrategyInvestigationRequest;
use App\Http\Requests\StoreActionStrategyAllocationRequest;
use App\Services\ActionStrategyService;
use App\Traits\ApiResponse;

class ActionStrategyController extends Controller
{
    /**
     * List all strategies for the authenticated user.
     */
    use ApiResponse;

    public function __construct(private ActionStrategyService $strategyService) {}

    public function index(Request $request): JsonResponse
    {
        $strategies = $this->strategyService->getStrategies($request->user());

        return $this->success(['strategies' => $strategies], 'Strategies retrieved successfully.');
    }

    public function show(Request $request, $id): JsonResponse
    {
        $strategy = $this->strategyService->getStrategy($request->user(), $id);

        return $this->success(['strategy' => $strategy], 'Strategy retrieved successfully.');
    }

    public function store(StoreActionStrategyRequest $request): JsonResponse
    {
        $strategy = $this->strategyService->storeStrategy($request->user(), $request);

        return $this->created(['strategy' => $strategy], 'Strategy created successfully.');
    }

    public function storeItems(StoreActionStrategyItemsRequest $request, $strategyId): JsonResponse
    {
        $strategy = $this->strategyService->storeItems($request->user(), $request, $strategyId);

        return $this->success(['strategy' => $strategy], 'Checklist items saved successfully.');
    }

    public function storeInvestigation(StoreActionStrategyInvestigationRequest $request, $strategyId): JsonResponse
    {
        $investigation = $this->strategyService->storeInvestigation($request->user(), $request, $strategyId);

        return $this->success(['investigation' => $investigation], 'Investigation saved successfully.');
    }

    public function storeAllocation(StoreActionStrategyAllocationRequest $request, $strategyId): JsonResponse
    {
        $strategy = $this->strategyService->storeAllocation($request->user(), $request, $strategyId);

        return $this->success(['strategy' => $strategy], 'Allocation saved successfully.');
    }

    public function destroy(Request $request, $id): JsonResponse
    {
        $this->strategyService->deleteStrategy($request->user(), $id);

        return $this->success([], 'Strategy deleted successfully.');
    }
}