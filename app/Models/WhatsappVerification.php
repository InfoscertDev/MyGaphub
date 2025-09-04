<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class WhatsappVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'otp',
        'is_verified',
        'otp_expires_at',
        'verified_at',
        'message_id',
        'meta_response',
        'attempts'
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'otp_expires_at' => 'datetime',
        'verified_at' => 'datetime',
        'meta_response' => 'array'
    ];

    protected $dates = [
        'otp_expires_at',
        'verified_at',
        'created_at',
        'updated_at'
    ];

    /**
     * Scope for active (non-expired) OTPs
     */
    public function scopeActive($query)
    {
        return $query->where('otp_expires_at', '>', now());
    }

    /**
     * Scope for verified phone numbers
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Scope for specific phone number
     */
    public function scopeForPhone($query, $phoneNumber)
    {
        return $query->where('phone_number', $phoneNumber);
    }

    /**
     * Check if OTP is expired
     */
    public function isExpired()
    {
        return $this->otp_expires_at->isPast();
    }

    /**
     * Check if phone number is already verified
     */
    public static function isPhoneVerified($phoneNumber)
    {
        return self::forPhone($phoneNumber)
            ->verified()
            ->where('verified_at', '>', now()->subHours(24)) // Verification valid for 24 hours
            ->exists();
    }

    /**
     * Get the latest verification record for a phone number
     */
    public static function getLatestForPhone($phoneNumber)
    {
        return self::forPhone($phoneNumber)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    /**
     * Clean up expired and old verification records
     */
    public static function cleanup()
    {
        // Delete expired unverified records older than 1 hour
        self::where('is_verified', false)
            ->where('otp_expires_at', '<', now()->subHour())
            ->delete();

        // Delete old verified records older than 30 days
        self::where('is_verified', true)
            ->where('verified_at', '<', now()->subDays(30))
            ->delete();
    }
}
