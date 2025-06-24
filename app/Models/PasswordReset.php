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

    public static function generateWebToken($email)
    {
        // Delete existing tokens for this email
        self::where('email', $email)->delete();

        // Generate standard web token
        $token = Str::random(60);

        return self::create([
            'email' => $email,
            'token' => hash('sha256', $token),
            'is_otp' => false,
            'created_at' => Carbon::now(),
        ]);
    }

    public static function verifyOTP($email, $otp, $expireMinutes = 45)
    {
        return self::where('email', $email)
                  ->where('token', $otp)
                  ->where('is_otp', true)
                  ->where('created_at', '>', Carbon::now()->subMinutes($expireMinutes))
                  ->first();
    }

    public static function verifyWebToken($email, $token)
    {
        return self::where('email', $email)
                  ->where('token', hash('sha256', $token))
                  ->where('is_otp', false)
                  ->where('created_at', '>', Carbon::now()->subHour())
                  ->first();
    }

    public function isExpired($expireMinutes = 15)
    {
        if ($this->is_otp) {
            return $this->created_at->addMinutes($expireMinutes)->isPast();
        }
        return $this->created_at->addHour()->isPast();
    }
}
