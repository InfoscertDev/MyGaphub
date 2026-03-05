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

    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['header', 'access', 'account', 'archive']);
        $data    = $this->protectionService->getProtectionList($request->user(), $filters);

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
