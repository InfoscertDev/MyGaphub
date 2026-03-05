<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeRequest;
use App\Services\IncomeService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    use ApiResponse;

    public function __construct(private IncomeService $incomeService) {}

    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['header', 'access', 'account', 'archive', 'period', 'income', 'crd', 'alo']);
        $data    = $this->incomeService->getIncomeList($request->user(), $filters);

        return $this->success($data, 'Income records retrieved successfully.');
    }

    public function nonPortfolioDetail(Request $request, int $id): JsonResponse
    {
        $data = $this->incomeService->getNonPortfolioDetail($request->user(), $id);

        return $this->success($data, 'Non-portfolio detail retrieved successfully.');
    }

    public function store(StoreIncomeRequest $request): JsonResponse
    {
        $result = $this->incomeService->storeIncome($request->user(), $request);

        return $this->created(['success' => $result], 'New income account has been saved successfully.');
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'income_date' => 'nullable|date|before:today',
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator->errors()->first());
        }

        try {
            $income = $this->incomeService->updateIncome($request->user(), $request, $id);

            return $this->success(['income' => $income], 'Income updated successfully.');
        } catch (\Exception $e) {
            return $this->serverError('Failed to update income.');
        }
    }

    public function updateRecord(Request $request, int $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'note'          => 'nullable|max:256',
            'record_period' => 'required',
            'amount'        => 'required|min:0|numeric',
        ], [
            'record_period.required' => 'Incorrect Period',
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator->errors()->first());
        }

        $updated = $this->incomeService->updateIncomeRecord($request->user(), $request, $id);

        return $updated
            ? $this->success([], 'Asset record updated successfully.', 201)
            : $this->notFound('Asset not found.');
    }
}
