<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserActivityTracking;
use App\FinicialCalculator;
use App\Helper\AnalyticsClass;

class UserActivityController extends Controller
{
    /**
     * Track user app open activity
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function trackAppOpen(Request $request)
    {
        $user = $request->user();

        try {
            $tracking = UserActivityTracking::firstOrCreate(['user_id' => $user->id]);
            $tracking->updateLastAppOpen();

            return response()->json([
                'success' => true,
                'message' => 'Activity tracked successfully',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to track activity',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mark financial calculation as completed
     * Call this after user completes financial calculator
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function markFinancialCalculationCompleted(Request $request)
    {
        $user = $request->user();

        try {
            // Verify that financial calculation is actually complete
            $calculator = FinicialCalculator::where('user_id', $user->id)->first();

            if (!$calculator) {
                return response()->json([
                    'success' => false,
                    'message' => 'Financial calculator not found',
                ], 404);
            }

            $tracking = UserActivityTracking::firstOrCreate(['user_id' => $user->id]);
            $tracking->markFinancialCalculationCompleted();

            return response()->json([
                'success' => true,
                'message' => 'Financial calculation marked as completed',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to mark financial calculation as completed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mark 7G as completed
     * Call this after user completes all 7G questions
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function markSevenGCompleted(Request $request)
    {
        $user = $request->user();

        try {
            // Verify that 7G is actually complete
            if (!AnalyticsClass::isSevenGVal($user)) {
                return response()->json([
                    'success' => false,
                    'message' => '7G questions not fully completed',
                ], 400);
            }

            $tracking = UserActivityTracking::firstOrCreate(['user_id' => $user->id]);
            $tracking->markSevenGCompleted();

            return response()->json([
                'success' => true,
                'message' => '7G marked as completed',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to mark 7G as completed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update 7G validation timestamp
     * Call this whenever user validates their 7G data
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSevenGValidation(Request $request)
    {
        $user = $request->user();

        try {
            $tracking = UserActivityTracking::firstOrCreate(['user_id' => $user->id]);
            $tracking->updateSevenGValidation();

            return response()->json([
                'success' => true,
                'message' => '7G validation updated',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update 7G validation',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get user's activity tracking status
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getActivityStatus(Request $request)
    {
        $user = $request->user();

        try {
            $tracking = UserActivityTracking::firstOrCreate(['user_id' => $user->id]);

            return response()->json([
                'success' => true,
                'data' => [
                    'last_app_open' => $tracking->last_app_open,
                    'financial_calculation_completed' => !is_null($tracking->financial_calculation_completed_at),
                    'seven_g_completed' => !is_null($tracking->seven_g_completed_at),
                    'seven_g_last_validated' => $tracking->seven_g_last_validated_at,
                    'seven_g_validation_reminder_count' => $tracking->seven_g_validation_reminder_count,
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get activity status',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}