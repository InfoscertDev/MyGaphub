<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Services\WhatsAppOTPService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class WhatsAppOTPController extends Controller
{
    private $whatsAppService;

    public function __construct(WhatsAppOTPService $whatsAppService)
    {
        $this->whatsAppService = $whatsAppService;
    }

    /**
     * Send OTP to WhatsApp number (includes verification check)
     */
    public function sendOTP(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => [
                'required',
                'string',
                'regex:/^\+?[1-9]\d{1,14}$/', // E.164 format validation
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid phone number format',
                'errors' => $validator->errors()
            ], 422);
        }

        $phoneNumber = $request->input('phone_number');
        $result = $this->whatsAppService->sendOTP($phoneNumber);

        if ($result['status']) {
            return response()->json([
                'status' => true,
                'message' => $result['message'],
                'data' => $result['data']
            ]);
        } else {
            // Handle different error types
            $statusCode = 400;

            if (isset($result['already_verified']) && $result['already_verified']) {
                $statusCode = 409; // Conflict
            } elseif (isset($result['rate_limited']) && $result['rate_limited']) {
                $statusCode = 429; // Too Many Requests
            }

            return response()->json([
                'status' => false,
                'message' => $result['message'],
                'error_type' => $this->getErrorType($result),
                'data' => $this->getErrorData($result)
            ], $statusCode);
        }
    }

    /**
     * Verify OTP
     */
    public function verifyOTP(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => [
                'required',
                'string',
                'regex:/^\+?[1-9]\d{1,14}$/'
            ],
            'otp' => [
                'required',
                'string',
                'digits:6'
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid input',
                'errors' => $validator->errors()
            ], 422);
        }

        $phoneNumber = $request->input('phone_number');
        $otp = $request->input('otp');

        $result = $this->whatsAppService->verifyOTP($phoneNumber, $otp);

        if ($result['status']) {
            return response()->json([
                'status' => true,
                'message' => $result['message'],
                'data' => $result['data']
            ]);
        } else {
            $statusCode = 400;

            // Set appropriate status codes based on error
            if (isset($result['code'])) {
                switch ($result['code']) {
                    case 'OTP_NOT_FOUND':
                        $statusCode = 404;
                        break;
                    case 'TOO_MANY_ATTEMPTS':
                        $statusCode = 429;
                        break;
                    case 'INVALID_OTP':
                        $statusCode = 400;
                        break;
                }
            }

            $responseData = [
                'status' => false,
                'message' => $result['message'],
                'error_code' => $result['code'] ?? null
            ];

            // Add remaining attempts if available
            if (isset($result['remaining_attempts'])) {
                $responseData['remaining_attempts'] = $result['remaining_attempts'];
            }

            return response()->json($responseData, $statusCode);
        }
    }

    /**
     * Get detailed verification status
     */
    public function getVerificationStatus(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => [
                'required',
                'string',
                'regex:/^\+?[1-9]\d{1,14}$/'
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid phone number format',
                'errors' => $validator->errors()
            ], 422);
        }

        $phoneNumber = $request->input('phone_number');
        $status = $this->whatsAppService->getVerificationStatus($phoneNumber);

        return response()->json([
            'status' => true,
            'data' => $status
        ]);
    }

    /**
     * Resend OTP (same as sendOTP but with different messaging)
     */
    public function resendOTP(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => [
                'required',
                'string',
                'regex:/^\+?[1-9]\d{1,14}$/'
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid phone number format',
                'errors' => $validator->errors()
            ], 422);
        }

        $phoneNumber = $request->input('phone_number');

        // Check current status first
        $status = $this->whatsAppService->getVerificationStatus($phoneNumber);

        if ($status['is_verified']) {
            return response()->json([
                'status' => false,
                'message' => 'Phone number is already verified',
                'data' => $status
            ], 409);
        }

        $result = $this->whatsAppService->sendOTP($phoneNumber);

        if ($result['status']) {
            return response()->json([
                'status' => true,
                'message' => 'OTP resent statusfully',
                'data' => $result['data']
            ]);
        } else {
            $statusCode = 400;

            if (isset($result['rate_limited']) && $result['rate_limited']) {
                $statusCode = 429;
            }

            return response()->json([
                'status' => false,
                'message' => $result['message'],
                'error_type' => $this->getErrorType($result),
                'data' => $this->getErrorData($result)
            ], $statusCode);
        }
    }

    /**
     * Get error type for response
     */
    private function getErrorType(array $result): ?string
    {
        if (isset($result['already_verified']) && $result['already_verified']) {
            return 'ALREADY_VERIFIED';
        }

        if (isset($result['rate_limited']) && $result['rate_limited']) {
            return 'RATE_LIMITED';
        }

        return 'SERVICE_ERROR';
    }

    /**
     * Get error data for response
     */
    private function getErrorData(array $result): array
    {
        $data = [];

        if (isset($result['wait_time'])) {
            $data['wait_time_minutes'] = $result['wait_time'];
        }

        return $data;
    }
}