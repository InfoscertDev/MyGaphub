<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Services\RoiService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoiController extends Controller
{
    use ApiResponse;

    public function __construct(private RoiService $roiService) {}

    public function roiStatus(Request $request): JsonResponse
    {
        $data = $this->roiService->getRoiStatus($request->user());

        return $this->success($data, 'ROI status retrieved successfully.');
    }

    public function improveRoi(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'investment' => 'required|numeric|min:10',
            'roce'       => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator->errors()->first());
        }

        $calculator = $this->roiService->updateRoi($request->user(), $request);

        return $this->success(['calculator' => $calculator], 'ROI updated successfully.');
    }
}
