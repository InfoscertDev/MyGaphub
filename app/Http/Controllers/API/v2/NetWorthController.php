<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Services\NetWorthService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NetWorthController extends Controller
{
    use ApiResponse;

    public function __construct(private NetWorthService $netWorthService) {}

    public function netWorth(Request $request): JsonResponse
    {
        $data = $this->netWorthService->getNetWorth($request->user());

        return $this->success($data, 'Net worth retrieved successfully.');
    }

    public function storeNet(Request $request): JsonResponse
    {
        $this->netWorthService->confirmNetWorth($request->user());

        return $this->success([], 'Net worth confirmed successfully.');
    }
}
