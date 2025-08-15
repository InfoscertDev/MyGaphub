<?php

namespace App\Http\Controllers\API\v2;


use App\Http\Controllers\Controller;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingsAPI extends Controller
{
     /**
     * Get all user settings - Main endpoint that initializes defaults if needed
     */
    public function getSettings(): JsonResponse
    {
        $userId = Auth::id();

        // Get all settings with automatic default initialization
        $settings = UserSetting::getUserSettingsWithDefaults($userId);

        return response()->json([
            'success' => true,
            'message' => 'Settings retrieved successfully',
            'data' => $settings,
        ]);
    }

    /**
     * Get all user settings (alias for getSettings for backward compatibility)
     */
    public function index(): JsonResponse
    {
        return $this->getSettings();
    }

    /**
     * Update notification settings
     */
    public function updateNotifications(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'payment_reminders' => 'boolean',
            'acquisition_opportunities' => 'boolean',
            'news_updates' => 'boolean',
            'personal_strategy' => 'boolean',
            'personalized_insights' => 'boolean',
            'marketing_promotions' => 'boolean',
            'marketing_delivery_method' => 'in:all,email,push',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $userId = Auth::id();
        $currentSettings = UserSetting::getUserSetting($userId, 'notifications',
            UserSetting::getDefaultNotificationSettings());

        // Merge with existing settings
        $newSettings = array_merge($currentSettings, $validator->validated());

        UserSetting::setUserSetting($userId, 'notifications', $newSettings);

        return response()->json([
            'success' => true,
            'message' => 'Notification settings updated successfully',
            'data' => $newSettings,
        ]);
    }

    /**
     * Update appearance settings
     */
    public function updateAppearance(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'theme' => 'required|in:light,dark,system',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $userId = Auth::id();
        $currentSettings = UserSetting::getUserSetting($userId, 'appearance',
            UserSetting::getDefaultAppearanceSettings());

        // Merge with existing settings
        $newSettings = array_merge($currentSettings, $validator->validated());

        UserSetting::setUserSetting($userId, 'appearance', $newSettings);

        return response()->json([
            'success' => true,
            'message' => 'Appearance settings updated successfully',
            'data' => $newSettings,
        ]);
    }

    /**
     * Update a specific setting (generic endpoint)
     */
    public function updateSetting(Request $request, string $settingKey): JsonResponse
    {
        $allowedKeys = ['notifications', 'appearance'];

        if (!in_array($settingKey, $allowedKeys)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid setting key',
            ], 400);
        }

        // Route to specific method based on setting key
        if ($settingKey === 'notifications') {
            return $this->updateNotifications($request);
        }

        if ($settingKey === 'appearance') {
            return $this->updateAppearance($request);
        }

        return response()->json([
            'success' => false,
            'message' => 'Setting not implemented',
        ], 400);
    }

    /**
     * Reset all settings to defaults
     */
    public function resetSettings(): JsonResponse
    {
        $userId = Auth::id();

        // Delete all existing settings for the user
        UserSetting::where('user_id', $userId)->delete();

        // Initialize defaults
        UserSetting::initializeUserDefaults($userId);

        // Get the fresh settings
        $settings = UserSetting::getUserSettingsWithDefaults($userId);

        return response()->json([
            'success' => true,
            'message' => 'All settings reset to defaults successfully',
            'data' => $settings,
        ]);
    }

    /**
     * Reset a specific setting to default
     */
    public function resetSetting(string $settingKey): JsonResponse
    {
        $allowedKeys = ['notifications', 'appearance'];

        if (!in_array($settingKey, $allowedKeys)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid setting key',
            ], 400);
        }

        $userId = Auth::id();

        // Delete the specific setting
        UserSetting::where('user_id', $userId)
            ->where('setting_key', $settingKey)
            ->delete();

        // Get default for this setting type
        $defaultMethod = 'getDefault' . ucfirst($settingKey) . 'Settings';
        $defaultSettings = UserSetting::$defaultMethod();

        // Create the default setting
        UserSetting::create([
            'user_id' => $userId,
            'setting_key' => $settingKey,
            'setting_value' => $defaultSettings,
        ]);

        return response()->json([
            'success' => true,
            'message' => ucfirst($settingKey) . ' settings reset to defaults successfully',
            'data' => $defaultSettings,
        ]);
    }

    /**
     * Get a specific setting with default initialization
     */
    public function getSetting(string $settingKey): JsonResponse
    {
        $allowedKeys = ['notifications', 'appearance'];

        if (!in_array($settingKey, $allowedKeys)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid setting key',
            ], 400);
        }

        $userId = Auth::id();

        // Initialize defaults first
        UserSetting::initializeUserDefaults($userId);

        // Get the specific setting (it will exist now)
        $settings = UserSetting::getUserSetting($userId, $settingKey);

        return response()->json([
            'success' => true,
            'message' => ucfirst($settingKey) . ' settings retrieved successfully',
            'data' => $settings,
        ]);
    }
}
