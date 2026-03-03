<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PasswordReset extends Model
{
    protected $fillable = ['email', 'token', 'is_otp', 'created_at'];

    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'is_otp' => 'boolean',
        'created_at' => 'datetime',
    ];

    public static function generateOTP($email, $expireMinutes = 45)
    {
        // Delete existing tokens for this email
        self::where('email', $email)->delete();

        // Generate 6-digit OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Create new OTP record
        return self::create([
            'email' => $email,
            'token' => $otp,
            'is_otp' => true,
            'created_at' => Carbon::now(),
        ]);
    }

    public static function generateWebToken($email, $plainToken = null)
    {
        // Delete existing tokens for this email
        self::where('email', $email)->where('is_otp', false)->delete();

        // Use provided token or generate new one
        if (!$plainToken) {
            $plainToken = Str::random(64);
        }

        // Hash the token for storage
        $hashedToken = hash('sha256', $plainToken);

        $record = self::create([
            'email' => $email,
            'token' => $hashedToken,
            'is_otp' => false,
            'created_at' => Carbon::now(),
        ]);

        // Return the record with plain token for reference
        $record->plain_token = $plainToken;
        return $record;
    }

    public static function verifyOTP($email, $otp, $expireMinutes = 45)
    {
        return self::where('email', $email)
                  ->where('token', $otp)
                  ->where('is_otp', true)
                  ->where('created_at', '>', Carbon::now()->subMinutes($expireMinutes))
                  ->first();
    }

    public static function verifyWebToken($email, $plainToken)
    {
        $hashedToken = hash('sha256', $plainToken);

        return self::where('email', $email)
                  ->where('token', $hashedToken)
                  ->where('is_otp', false)
                  ->where('created_at', '>', Carbon::now()->subHour())
                  ->first();
    }

    public function isExpired($expireMinutes = null)
    {
        if ($this->is_otp) {
            $minutes = $expireMinutes ?? 45; // Default 45 minutes for OTP
            return $this->created_at->addMinutes($minutes)->isPast();
        }

        // Default 60 minutes for web tokens
        return $this->created_at->addHour()->isPast();
    }
}