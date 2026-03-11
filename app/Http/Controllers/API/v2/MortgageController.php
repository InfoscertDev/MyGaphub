<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMortgageRequest;
use App\Http\Requests\UpdateMortgageRequest;
use App\Services\LiabilityService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

// =============================================================================
// MORTGAGE CONTROLLER
// POST   v2/mortgage
// GET    v2/mortgage
// PUT    v2/mortgage/{id}
// =============================================================================
class MortgageController extends Controller
{
    use ApiResponse;

    public function __construct(private LiabilityService $liabilityService) {}

    // GET  v2/mortgage
    public function index(Request $request): JsonResponse
    {
        $params = [
            'header'  => $request->get('header'),
            'access'  => $request->get('access'),
            'account' => $request->get('account'),
            'archive' => $request->get('archive'),
        ];

        $result = $this->liabilityService->getMortgages($request->user(), $params);

        // Header-triggered archive action
        if ($result['action'] ?? false) {
            return $result['response'];
        }

        return $this->success($result, 'Mortgages retrieved successfully');
    }

    // POST  v2/mortgage
    public function store(StoreMortgageRequest $request): JsonResponse
    {
        $result = $this->liabilityService->storeMortgage($request->user(), $request);
        return $this->created(['mortgage' => $result['mortgage']], 'Mortgage created successfully');
    }

    // PUT  v2/mortgage/{id}
    public function update(UpdateMortgageRequest $request, int $id): JsonResponse
    {
        $this->liabilityService->updateMortgage($request->user(), $id, $request);
        return $this->success([], 'Mortgage information updated successfully');
    }
}
