<?php

namespace App\Services;

use App\Models\WhatsappVerification;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class WhatsAppOTPService
{
    private $accessToken;
    private $phoneNumberId;
    private $businessAccountId;

    public function __construct()
    {
        $this->accessToken = config('whatsapp.access_token');
        $this->phoneNumberId = config('whatsapp.phone_number_id');
        $this->businessAccountId = config('whatsapp.business_account_id');
    }

    /**
     * Send OTP to WhatsApp number with verification check
     */
    public function sendOTP(string $phoneNumber): array
    {
        try {
            $formattedPhone = $this->formatPhoneNumber($phoneNumber);

            // Check if phone number is already verified
            if (WhatsappVerification::isPhoneVerified($formattedPhone)) {
                return [
                    'status' => false,
                    'message' => 'Phone number is already verified',
                    'already_verified' => true
                ];
            }

            // Check rate limiting - prevent multiple OTPs within 2 minutes
            $recentOTP = WhatsappVerification::forPhone($formattedPhone)
                ->where('created_at', '>', now()->subMinutes(2))
                ->first();

            if ($recentOTP) {
                $waitTime = 1 - now()->diffInMinutes($recentOTP->created_at);
                return [
                    'status' => false,
                    'message' => "Please wait {$waitTime} minute(s) before requesting another OTP",
                    'rate_limited' => true,
                    'wait_time' => $waitTime
                ];
            }

            // Generate 6-digit OTP
            $otp = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
            $expiresAt = now()->addMinutes(config('whatsapp.otp_expiry_minutes', 10));

            // Send message via WhatsApp Business API
            $response = $this->sendWhatsAppMessage($formattedPhone, $otp);

            if ($response['status']) {
                // Store OTP in database
                $verification = WhatsappVerification::create([
                    'phone_number' => $formattedPhone,
                    'otp' => $otp,
                    'otp_expires_at' => $expiresAt,
                    'message_id' => $response['message_id'],
                    'meta_response' => $response['response_data'] ?? null,
                    'attempts' => 0
                ]);

                Log::info('WhatsApp OTP sent successfully', [
                    'phone' => $formattedPhone,
                    'verification_id' => $verification->id,
                    'message_id' => $response['message_id']
                ]);

                return [
                    'status' => true,
                    'message' => 'OTP sent successfully',
                    'data' => [
                        'phone_number' => $formattedPhone,
                        'otp' => $otp,
                        'expires_at' => $expiresAt->toISOString(),
                        'expires_in_minutes' => config('whatsapp.otp_expiry_minutes', 10),
                        'message_id' => $response['message_id']
                    ]
                ];
            } else {
                Log::error('Failed to send WhatsApp OTP', [
                    'phone' => $formattedPhone,
                    'error' => $response['error']
                ]);

                return [
                    'status' => false,
                    'message' => 'Failed to send OTP',
                    'error' => $response['error']
                ];
            }
        } catch (Exception $e) {
            Log::error('WhatsApp OTP service error', [
                'phone' => $phoneNumber,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'status' => false,
                'message' => 'Service error occurred',
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Verify OTP
     */
    public function verifyOTP(string $phoneNumber, string $otp): array
    {
        try {
            $formattedPhone = $this->formatPhoneNumber($phoneNumber);

            // Get the latest verification record for this phone number
            $verification = WhatsappVerification::forPhone($formattedPhone)
                ->where('is_verified', false)
                ->active()
                ->orderBy('created_at', 'desc')
                ->first();

            if (!$verification) {
                return [
                    'status' => false,
                    'message' => 'No active OTP found or OTP has expired',
                    'code' => 'OTP_NOT_FOUND'
                ];
            }

            // Check if too many attempts
            if ($verification->attempts >= 3) {
                return [
                    'status' => false,
                    'message' => 'Too many failed attempts. Please request a new OTP',
                    'code' => 'TOO_MANY_ATTEMPTS'
                ];
            }

            // Increment attempts
            $verification->increment('attempts');

            // Verify OTP
            if ($verification->otp === $otp) {
                // Mark as verified
                $verification->update([
                    'is_verified' => true,
                    'verified_at' => now()
                ]);

                // Clean up old unverified records for this phone
                WhatsappVerification::forPhone($formattedPhone)
                    ->where('id', '!=', $verification->id)
                    ->where('is_verified', false)
                    ->delete();

                Log::info('WhatsApp phone verified successfully', [
                    'phone' => $formattedPhone,
                    'verification_id' => $verification->id
                ]);

                return [
                    'status' => true,
                    'message' => 'Phone number verified successfully',
                    'data' => [
                        'phone_number' => $formattedPhone,
                        'verified_at' => $verification->verified_at->toISOString()
                    ]
                ];
            } else {
                $remainingAttempts = 3 - $verification->attempts;

                return [
                    'status' => false,
                    'message' => 'Invalid OTP',
                    'code' => 'INVALID_OTP',
                    'remaining_attempts' => $remainingAttempts
                ];
            }
        } catch (Exception $e) {
            Log::error('WhatsApp OTP verification error', [
                'phone' => $phoneNumber,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'status' => false,
                'message' => 'Verification error occurred',
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Check if phone number is verified
     */
    public function isPhoneVerified(string $phoneNumber): bool
    {
        $formattedPhone = $this->formatPhoneNumber($phoneNumber);
        return WhatsappVerification::isPhoneVerified($formattedPhone);
    }

    /**
     * Get verification status with details
     */
    public function getVerificationStatus(string $phoneNumber): array
    {
        $formattedPhone = $this->formatPhoneNumber($phoneNumber);

        $verification = WhatsappVerification::getLatestForPhone($formattedPhone);

        if (!$verification) {
            return [
                'is_verified' => false,
                'has_pending_otp' => false,
                'phone_number' => $formattedPhone
            ];
        }

        $isVerified = $verification->is_verified &&
                     $verification->verified_at > now()->subHours(24);

        $hasPendingOTP = !$verification->is_verified &&
                        !$verification->isExpired();

        return [
            'is_verified' => $isVerified,
            'has_pending_otp' => $hasPendingOTP,
            'phone_number' => $formattedPhone,
            'verified_at' => $isVerified ? $verification->verified_at->toISOString() : null,
            'otp_expires_at' => $hasPendingOTP ? $verification->otp_expires_at->toISOString() : null,
            'attempts_used' => $hasPendingOTP ? $verification->attempts : null,
            'max_attempts' => 3
        ];
    }

    /**
     * Send WhatsApp message (refactored for better organization)
     */
    private function sendWhatsAppMessage(string $phoneNumber, string $otp): array
    {
        try {
            $message = "Your verification code is: *{$otp}*\n\nThis code will expire in " .
                      config('whatsapp.otp_expiry_minutes', 10) .
                      " minutes. Do not share this code with anyone.";

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Content-Type' => 'application/json',
            ])->post("https://graph.facebook.com/v18.0/{$this->phoneNumberId}/messages", [
                'messaging_product' => 'whatsapp',
                'to' => $phoneNumber,
                'type' => 'text',
                'text' => [
                    'body' => $message
                ]
            ]);

            if ($response->successful()) {
                return [
                    'status' => true,
                    'message_id' => $response->json('messages.0.id'),
                    'response_data' => $response->json()
                ];
            } else {
                return [
                    'status' => false,
                    'error' => $response->json(),
                    'status_code' => $response->status()
                ];
            }
        } catch (Exception $e) {
            return [
                'status' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Format phone number for WhatsApp (remove + and ensure proper format)
     */
    private function formatPhoneNumber(string $phoneNumber): string
    {
        // Remove any non-numeric characters except +
        $phoneNumber = preg_replace('/[^\d+]/', '', $phoneNumber);

        // Ensure it starts with +
        if (strpos($phoneNumber, '+') !== 0) {
            $phoneNumber = '+' . $phoneNumber;
        }

        return $phoneNumber;
    }

    /**
     * Clean up old verification records
     */
    public function cleanup(): void
    {
        try {
            WhatsappVerification::cleanup();
            Log::info('WhatsApp verification records cleaned up');
        } catch (Exception $e) {
            Log::error('Error cleaning up WhatsApp verification records', [
                'error' => $e->getMessage()
            ]);
        }
    }
}
