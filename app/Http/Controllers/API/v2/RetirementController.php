<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRetirementRequest;
use App\Http\Requests\UpdateRetirementRequest;
use App\Services\RetirementService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RetirementController extends Controller
{
    use ApiResponse;

    public function __construct(private RetirementService $retirementService) {}

    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['header', 'access', 'account', 'archive']);
        $data    = $this->retirementService->getRetirementList($request->user(), $filters);

        return $this->success($data, 'Retirement records retrieved successfully.');
    }

    public function store(StoreRetirementRequest $request): JsonResponse
    {
        // $user
        $result = $this->retirementService->storeRetirement($request->user(), $request);

        if (!$result['success']) {
            return $this->error($result['message']);
        }

        return $this->created(['pension' => $result['pension']], 'Pension account created successfully.');
    }

    public function update(UpdateRetirementRequest $request, int $id): JsonResponse
    {
        $pension = $this->retirementService->updateRetirement($request->user(), $request, $id);

        return $this->success(['pension' => $pension], 'Retirement record updated successfully.');
    }
}
