<?php

namespace App\Http\Controllers\API\v2;

use App\Enums\PortfolioToken;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioDetailsRequest;
use App\Http\Requests\UpdatePortfolioPhotoRequest;
use App\Http\Requests\UpdatePortfolioRecordsRequest;
use App\Http\Requests\UpdatePortfolioNoteRequest;
use App\Services\PortfolioService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    use ApiResponse;

    public function __construct(private PortfolioService $portfolioService) {}

    // ─────────────────────────────────────────────────────────
    // GET  v2/portfolio
    // ─────────────────────────────────────────────────────────
    public function index(Request $request): JsonResponse
    {
        $data = $this->portfolioService->getPortfolioOverview($request->user(), $request->all());
        return $this->success($data, 'Portfolios retrieved successfully');
    }

    // ─────────────────────────────────────────────────────────
    // GET  v2/portfolio/asset-types
    // ─────────────────────────────────────────────────────────
    public function assetTypes(): JsonResponse
    {
        $data = $this->portfolioService->getAssetTypes();
        return $this->success($data, 'Portfolio Asset Types retrieved successfully');
    }

    // ─────────────────────────────────────────────────────────
    // GET  v2/portfolio/information
    // ─────────────────────────────────────────────────────────
    public function information(): JsonResponse
    {
        $data = $this->portfolioService->getInformation();
        return $this->success($data, 'Portfolio information retrieved successfully');
    }

    // ─────────────────────────────────────────────────────────
    // POST v2/portfolio
    // ─────────────────────────────────────────────────────────
    public function store(StorePortfolioRequest $request): JsonResponse
    {
        return $this->portfolioService->storeAsset($request->user(), $request);
    }

    // ─────────────────────────────────────────────────────────
    // GET  v2/portfolio/investment
    // ─────────────────────────────────────────────────────────
    public function investment(Request $request): JsonResponse
    {
        $data = $this->portfolioService->getInvestment($request->user(), $request->get('archive'));
        return $this->success($data, 'Investment data retrieved successfully');
    }

    // ─────────────────────────────────────────────────────────
    // GET  v2/portfolio/braid/{braid}
    // ─────────────────────────────────────────────────────────
    public function braid(Request $request, string $braid): JsonResponse
    {
        if (!in_array(strtolower($braid), PortfolioToken::BRAID_CLASSES)) {
            return $this->notFound('Asset Type not found');
        }

        $data = $this->portfolioService->getBraid(
            $request->user(),
            strtolower($braid),
            $request->get('archive'),
            $request->all()
        );

        return $this->success($data, 'BRAID data retrieved successfully');
    }

    // ─────────────────────────────────────────────────────────
    // GET  v2/portfolio/braid/{braid}/{id}
    // ─────────────────────────────────────────────────────────
    public function braidInformation(Request $request, string $braid, int $id): JsonResponse
    {
        $result = $this->portfolioService->getAssetDetail($request->user(), $braid, $id, $request->all());

        // Header-triggered side-effect (archive or period action)
        if ($result['action'] ?? false) {
            return $result['response'];
        }

        if ($result['not_found'] ?? false) {
            return $this->notFound('Asset not found');
        }

        return $this->success($result, 'Asset retrieved successfully');
    }

    // ─────────────────────────────────────────────────────────
    // POST v2/portfolio/{id}/photo
    // ─────────────────────────────────────────────────────────
    public function updatePhoto(UpdatePortfolioPhotoRequest $request, int $id): JsonResponse
    {
        $result = $this->portfolioService->updatePhoto($request->user(), $id, $request);

        if ($result['not_found'] ?? false) {
            return $this->notFound('Asset not found');
        }

        return $this->success(['asset' => $result['asset']], 'Photo updated successfully');
    }

    // ─────────────────────────────────────────────────────────
    // PUT  v2/portfolio/{id}/details
    // ─────────────────────────────────────────────────────────
    public function updateDetails(UpdatePortfolioDetailsRequest $request, int $id): JsonResponse
    {
        $result = $this->portfolioService->updateDetails($request->user(), $id, $request);

        if ($result['not_found'] ?? false) {
            return $this->notFound('Asset not found');
        }

        return $this->success(['asset' => $result['asset']], 'Asset updated successfully');
    }

    // ─────────────────────────────────────────────────────────
    // PUT  v2/portfolio/{id}/records
    // ─────────────────────────────────────────────────────────
    public function updateRecords(UpdatePortfolioRecordsRequest $request, int $id): JsonResponse
    {
        $period = $request->period
            ? date('Y-m-d', strtotime($request->period . '-01'))
            : date('Y-m') . '-01';

        $ok = $this->portfolioService->updateRecords($request->user(), $id, $period, $request);

        return $ok
            ? $this->success([], 'Asset updated successfully')
            : $this->notFound('Asset not found');
    }

    // ─────────────────────────────────────────────────────────
    // PUT  v2/portfolio/{id}/note
    // ─────────────────────────────────────────────────────────
    public function updateNote(UpdatePortfolioNoteRequest $request, int $id): JsonResponse
    {
        $period = date('Y-m-d', strtotime($request->period . '-01'));
        $ok     = $this->portfolioService->updateNote($request->user(), $id, $period, $request);

        return $ok
            ? $this->success([], 'Note updated successfully')
            : $this->notFound('Asset not found');
    }

    // ─────────────────────────────────────────────────────────
    // DELETE v2/portfolio/{id}
    // ─────────────────────────────────────────────────────────
    public function destroy(Request $request, int $id): JsonResponse
    {
        $result = $this->portfolioService->deleteAsset($request->user(), $id);

        if ($result['not_found'] ?? false) {
            return $this->notFound('Portfolio asset not found');
        }

        return $this->success(
            [],
            "Portfolio and {$result['count']} related record(s) deleted successfully."
        );
    }
}
