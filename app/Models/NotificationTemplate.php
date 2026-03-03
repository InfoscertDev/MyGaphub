<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'platform',
        'title',
        'body',
        'category',
        'type',
        'action',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get template by slug and platform
     */
    public static function getTemplate($slug, $platform)
    {
        return self::where('slug', $slug)
            ->where('platform', strtolower($platform))
            ->where('is_active', true)
            ->first();
    }

    /**
     * Get template for user's device platform
     */
    public static function getTemplateForUser($slug, $userId)
    {
        // Get user's primary device platform
        $device = \App\Models\UserDevice::where('user_id', $userId)
            ->where('is_active', true)
            ->orderBy('last_used_at', 'desc')
            ->first();

        $platform = $device ? strtolower($device->device_type) : 'android';

        // Normalize platform names
        if (strpos($platform, 'ios') !== false || strpos($platform, 'iphone') !== false) {
            $platform = 'ios';
        } else {
            $platform = 'android';
        }

        return self::getTemplate($slug, $platform);
    }
}
