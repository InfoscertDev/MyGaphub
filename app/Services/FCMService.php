<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\UserDevice;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class FCMService
{
    protected $serviceAccountPath;
    protected $fcmUrl = 'https://fcm.googleapis.com/v1/projects/{project-id}/messages:send';
    protected $projectId;

    public function __construct()
    {
        $this->serviceAccountPath = storage_path('credensials/mygaphub-4f01fd70cca4.json');

        // Get project ID from service account
        $serviceAccount = json_decode(file_get_contents($this->serviceAccountPath), true);
        $this->projectId = $serviceAccount['project_id'];
        $this->fcmUrl = str_replace('{project-id}', $this->projectId, $this->fcmUrl);
    }

    /**
     * Get OAuth 2.0 access token using service account
     */
    protected function getAccessToken()
    {
        // Cache token for 50 minutes (tokens expire after 1 hour)
        return Cache::remember('fcm_access_token', 50 * 60, function () {
            $serviceAccount = json_decode(file_get_contents($this->serviceAccountPath), true);

            $now = time();
            $expiration = $now + 3600; // 1 hour

            // Create JWT header
            $header = json_encode([
                'alg' => 'RS256',
                'typ' => 'JWT'
            ]);

            // Create JWT claim set
            $claimSet = json_encode([
                'iss' => $serviceAccount['client_email'],
                'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
                'aud' => 'https://oauth2.googleapis.com/token',
                'exp' => $expiration,
                'iat' => $now
            ]);

            // Encode header and claim set
            $base64UrlHeader = $this->base64UrlEncode($header);
            $base64UrlClaimSet = $this->base64UrlEncode($claimSet);
            $signatureInput = $base64UrlHeader . '.' . $base64UrlClaimSet;

            // Sign with private key
            $privateKey = openssl_pkey_get_private($serviceAccount['private_key']);
            openssl_sign($signatureInput, $signature, $privateKey, 'SHA256');
            openssl_free_key($privateKey);
            $base64UrlSignature = $this->base64UrlEncode($signature);

            // Create JWT
            $jwt = $signatureInput . '.' . $base64UrlSignature;

            // Exchange JWT for access token
            $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
                'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                'assertion' => $jwt
            ]);

            if ($response->successful()) {
                return $response->json()['access_token'];
            }

            throw new \Exception('Failed to get access token: ' . $response->body());
        });
    }

    /**
     * Base64 URL encode
     */
    protected function base64UrlEncode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    /**
     * Send notification to a specific user
     */
    public function sendToUser(
        $userId,
        $title,
        $message,
        $category = 'primary',
        $type = 'general',
        $action = null,
        $data = []
    ) {
        // 1. Save notification to database
        $notification = Notification::create([
            'user_id' => $userId,
            'title' => $title,
            'message' => $message,
            'action' => $action,
            'category' => $category,
            'type' => $type,
            'data' => $data,
            'seen' => false,
            'received_at' => now(),
        ]);

        // 2. Get user's FCM tokens
        $devices = UserDevice::where('user_id', $userId)
            ->where('is_active', true)
            ->get();

        if ($devices->isEmpty()) {
            return [
                'success' => false,
                'message' => 'No devices found',
                'notification_id' => $notification->id
            ];
        }

        // 3. Send push notification to all devices
        $results = [];
        foreach ($devices as $device) {
            try {
                $fcmData = array_merge($data, [
                    'notification_id' => (string) $notification->id,
                    'type' => $type,
                    'category' => $category,
                    'action' => $action ?? '',
                    'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
                ]);

                // FCM v1 API format
                $payload = [
                    'message' => [
                        'token' => $device->fcm_token,
                        'notification' => [
                            'title' => $title,
                            'body' => $message,
                        ],
                        'data' => $fcmData,
                        'android' => [
                            'priority' => 'high',
                            'notification' => [
                                'sound' => 'default',
                                'channel_id' => 'default'
                            ]
                        ],
                        'apns' => [
                            'payload' => [
                                'aps' => [
                                    'sound' => 'default',
                                    'badge' => 1
                                ]
                            ]
                        ]
                    ]
                ];

                $accessToken = $this->getAccessToken();

                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                ])->post($this->fcmUrl, $payload);

                info([ 'Authorization' => $accessToken, $this->fcmUrl]);

                if ($response->successful()) {
                    $results[] = ['device_id' => $device->id, 'status' => 'sent'];
                } else {
                    $responseData = $response->json();

                    // Check if token is invalid
                    if (isset($responseData['error']['status'])) {
                        $errorStatus = $responseData['error']['status'];

                        if (in_array($errorStatus, ['NOT_FOUND', 'INVALID_ARGUMENT', 'UNREGISTERED'])) {
                            $device->update(['is_active' => false]);
                        }
                    }

                    $results[] = [
                        'device_id' => $device->id,
                        'status' => 'failed',
                        'error' => $response->body()
                    ];
                }

            } catch (\Exception $e) {
                $results[] = [
                    'device_id' => $device->id,
                    'status' => 'failed',
                    'error' => $e->getMessage()
                ];

                Log::error('FCM Send Error', [
                    'user_id' => $userId,
                    'device_id' => $device->id,
                    'error' => $e->getMessage()
                ]);
            }
        }

        return [
            'success' => true,
            'notification_id' => $notification->id,
            'results' => $results
        ];
    }

    /**
     * Send notification to multiple users
     */
    public function sendToMultipleUsers(
        $userIds,
        $title,
        $message,
        $category = 'primary',
        $type = 'general',
        $action = null,
        $data = []
    ) {
        $results = [];
        foreach ($userIds as $userId) {
            $results[$userId] = $this->sendToUser(
                $userId,
                $title,
                $message,
                $category,
                $type,
                $action,
                $data
            );
        }
        return $results;
    }
}