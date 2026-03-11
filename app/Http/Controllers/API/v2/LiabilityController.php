<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLiabilityRequest;
use App\Http\Requests\UpdateLiabilityRequest;
use App\Services\LiabilityService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

// =============================================================================
// LIABILITY CONTROLLER
// POST   v2/liability
// GET    v2/liability
// PUT    v2/liability/{id}
// =============================================================================
class LiabilityController extends Controller
{
    use ApiResponse;

    public function __construct(private LiabilityService $liabilityService) {}

    // GET  v2/liability
    public function index(Request $request): JsonResponse
    {
        $params = [
            'archive' => $request->get('archive'),
            'header'  => $request->get('header'),
            'access'  => $request->get('access'),
            'account' => $request->get('account'),
            'kpi'     => $request->get('kpi'),
            'crd'     => $request->get('crd'),
            'alo'     => $request->get('alo'),
        ];

        $result = $this->liabilityService->getLiabilities($request->user(), $params);

        // Header-triggered action (archive / allocation)
        if ($result['action'] ?? false) {
            return $result['response'];
        }

        return $this->success($result, 'Liabilities retrieved successfully');
    }

    // POST  v2/liability
    public function store(StoreLiabilityRequest $request): JsonResponse
    {
        $result = $this->liabilityService->storeLiability($request->user(), $request);
        return $this->created(['liability' => $result['liability']], 'Liability created successfully');
    }

    // PUT  v2/liability/{id}
    public function update(UpdateLiabilityRequest $request, int $id): JsonResponse
    {
        $this->liabilityService->updateLiability($request->user(), $id, $request);
        return $this->success([], 'Liability information updated successfully');
    }
}
