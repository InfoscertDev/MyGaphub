<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Services\SeedService;
use App\Traits\ApiResponse;
use App\Http\Requests\SavePhilantrophyRequest;
use App\Http\Requests\StoreILabRequest;

class WheelController extends Controller
{
    use ApiResponse;

    public function __construct(private SeedService $seedService) {}

    /**
     * Get updated tiles for the authenticated user.
     */
    public function tiles(Request $request)
    {
        $user = $request->user();
        $tiles = GapAccount::updatedTiles($user);

        return response()->json([
            'status'  => true,
            'data'    => ['tiles' => $tiles],
            'message' => 'Tiles retrieved successfully.',
        ]);
    }

    // -------------------------------------------------------------------------
    // Expenditure & Philanthropy
    // -------------------------------------------------------------------------

    public function expenditure(Request $request): JsonResponse
    {
        $data = $this->seedService->getExpenditure($request->user());

        return $this->success($data, '360 Expenditure detail.');
    }

    public function philanthropy(Request $request): JsonResponse
    {
        $data = $this->seedService->getPhilanthropy($request->user());

        return $this->success($data, '360 Philanthropy detail.');
    }

    public function savePhilanthropy(SavePhilantrophyRequest $request): JsonResponse
    {
        $result = $this->seedService->savePhilanthropy($request->user(), $request);

        if (!$result['success']) {
            return $this->error(
                'Your giving must equal your grand total.',
                ['grand_current' => $result['grand_current']],
                422
            );
        }

        return $this->success(
            ['philantrophy' => $result['philantrophy']],
            'Philanthropy saved successfully.'
        );
    }

    // -------------------------------------------------------------------------
    // ILab
    // -------------------------------------------------------------------------

    public function ilab(Request $request): JsonResponse
    {
        $data = $this->seedService->getILab($request->user());

        return $this->success($data, 'ILab information retrieved successfully.');
    }

    public function storeILab(StoreILabRequest $request): JsonResponse
    {
        $ilab = $this->seedService->storeILab($request->user(), $request);

        return $this->success(['ilab' => $ilab], 'ILab target has been set.');
    }
}
