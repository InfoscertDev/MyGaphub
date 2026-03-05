<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquityRequest;
use App\Http\Requests\UpdateEquityRequest;
use App\Services\EquityService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EquityController extends Controller
{
    use ApiResponse;

    public function __construct(private EquityService $equityService) {}

    public function equityInfo(Request $request): JsonResponse
    {
        $equity_info = $this->equityService->getEquityInfo($request->user());

        return $this->success(['equity_info' => $equity_info], 'Equity info retrieved successfully.');
    }

    public function index(Request $request): JsonResponse
    {
        $archive = (bool) $request->get('archive');
        $data    = $this->equityService->getEquityList($request->user(), $archive);

        return $this->success($data, 'Equity records retrieved successfully.');
    }

    public function store(StoreEquityRequest $request): JsonResponse
    {
        $equity = $this->equityService->storeEquity($request->user(), $request);

        return $this->created(['equity' => $equity], 'Equity stored successfully.');
    }

    public function update(UpdateEquityRequest $request, int $id): JsonResponse
    {
        $equity = $this->equityService->updateEquity($request->user(), $request, $id);

        return $this->success(['equity' => $equity], 'Equity information updated successfully.');
    }
}
