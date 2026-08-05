<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProtectionRequest;
use App\Http\Requests\UpdateProtectionRequest;
use App\Services\ProtectionService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProtectionController extends Controller
{
    use ApiResponse;

    public function __construct(private ProtectionService $protectionService) {}

    /**
     * Returns all categories with their types.
     * Frontend calls this once on load to populate
     * the category picker and dynamically switch type options.
     */
    public function config(): JsonResponse
    {
        $data = array();

        foreach (StoreProtectionRequest::CATEGORIES as $category) {
            $data[] = array(
                'category' => $category,
                'types'    => StoreProtectionRequest::PROTECTION_TYPES[$category],
            );
        }

        return $this->success(
            array(
                'categories'    => StoreProtectionRequest::CATEGORIES,
                'types_by_category' => $data,
                'pay_frequencies'   => StoreProtectionRequest::PAY_FREQUENCIES,
                'payment_types'     => StoreProtectionRequest::PAYMENT_TYPES,
            ),
            'Protection configuration loaded successfully.'
        );
    }

    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['header', 'access', 'account', 'archive']);

        // monthly   → Monthly records only
        // annually  → Annually records only
        $period  = $request->query('period', '');

        $data = $this->protectionService->getProtectionList(
            $request->user(),
            $filters,
            $period
        );

        return $this->success($data, 'Protection records retrieved successfully.');
    }

    public function store(StoreProtectionRequest $request): JsonResponse
    {
        $protection = $this->protectionService->storeProtection($request->user(), $request);

        return $this->created(['protection' => $protection], 'Protection record created successfully.');
    }

    public function update(UpdateProtectionRequest $request, int $id): JsonResponse
    {
        $protection = $this->protectionService->updateProtection($request->user(), $request, $id);

        return $this->success(['protection' => $protection], 'Protection record updated successfully.');
    }
}
