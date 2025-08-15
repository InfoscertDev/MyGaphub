<?php

// app/Models/UserSetting.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;

class UserSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'setting_key',
        'setting_value',
    ];

    protected $casts = [
        'setting_value' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get a specific setting for a user
     */
    public static function getUserSetting($userId, $settingKey, $default = null)
    {
        $setting = static::where('user_id', $userId)
            ->where('setting_key', $settingKey)
            ->first();

        return $setting ? $setting->setting_value : $default;
    }

    /**
     * Set a specific setting for a user
     */
    public static function setUserSetting($userId, $settingKey, $settingValue)
    {
        return static::updateOrCreate(
            [
                'user_id' => $userId,
                'setting_key' => $settingKey,
            ],
            [
                'setting_value' => $settingValue,
            ]
        );
    }

    /**
     * Get default notification settings
     */
    public static function getDefaultNotificationSettings()
    {
        return [
            'payment_reminders' => true,
            'acquisition_opportunities' => true,
            'news_updates' => true,
            'personal_strategy' => true,
            'personalized_insights' => true,
            'marketing_promotions' => true,
            'marketing_delivery_method' => 'all', // all, email, push
        ];
    }

    /**
     * Get default appearance settings
     */
    public static function getDefaultAppearanceSettings()
    {
        return [
            'theme' => 'light', // light, dark, system
        ];
    }

    /**
     * Initialize default settings for a user if they don't exist
     * This can be called from profile endpoint or any common endpoint
     */
    public static function initializeUserDefaults($userId)
    {
        // Check if user has notification settings, create if not
        $notificationExists = static::where('user_id', $userId)
            ->where('setting_key', 'notifications')
            ->exists();

        if (!$notificationExists) {
            static::create([
                'user_id' => $userId,
                'setting_key' => 'notifications',
                'setting_value' => static::getDefaultNotificationSettings(),
            ]);
        }

        // Check if user has appearance settings, create if not
        $appearanceExists = static::where('user_id', $userId)
            ->where('setting_key', 'appearance')
            ->exists();

        if (!$appearanceExists) {
            static::create([
                'user_id' => $userId,
                'setting_key' => 'appearance',
                'setting_value' => static::getDefaultAppearanceSettings(),
            ]);
        }

        return true;
    }

    /**
     * Get user settings with automatic initialization
     * This ensures defaults are created and returned if they don't exist
     */
    public static function getUserSettingsWithDefaults($userId)
    {
        // Initialize defaults if they don't exist
        static::initializeUserDefaults($userId);

        // Get all settings for the user
        $settings = static::where('user_id', $userId)->get()
            ->pluck('setting_value', 'setting_key')
            ->toArray();

        return $settings;
    }
}