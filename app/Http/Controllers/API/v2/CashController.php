<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCashRequest;
use App\Http\Requests\UpdateCashRequest;
use App\Services\CashService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CashController extends Controller
{
    use ApiResponse;

    public function __construct(private CashService $cashService) {}

    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['header', 'access', 'account', 'archive', 'kpi']);

        $data = $this->cashService->getCashList($request->user(), $filters);

        return $this->success($data, 'Cash accounts retrieved successfully.');
    }

    public function store(StoreCashRequest $request): JsonResponse
    {
        $data = $this->cashService->storeCash($request->user(), $request);

        return $this->created($data, 'Cash account created successfully.');
    }

    public function update(UpdateCashRequest $request, int $id): JsonResponse
    {
        $data = $this->cashService->updateCash($request->user(), $request, $id);

        return $this->success($data, 'Cash information updated successfully.');
    }
}
