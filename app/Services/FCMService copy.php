<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\UserDevice;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class FCMServiceOld
{
    protected $serverKey;
    protected $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

    public function __construct()
    {
        $this->serverKey = config('services.fcm.server_key');
    }

    /**
     * Send notification to a specific user
     *
     * @param int $userId
     * @param string $title
     * @param string $message
     * @param string $category (primary, success, warning, danger, info)
     * @param string $type (general, order, payment, reminder, etc.)
     * @param string|null $action (optional action/route)
     * @param array $data (additional data)
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

                $payload = [
                    'to' => $device->fcm_token,
                    'notification' => [
                        'title' => $title,
                        'body' => $message,
                        'sound' => 'default',
                        'badge' => '1',
                    ],
                    'data' => $fcmData,
                    'priority' => 'high',
                ];

                $response = Http::withHeaders([
                    'Authorization' => 'key=' . $this->serverKey,
                    'Content-Type' => 'application/json',
                ])->post($this->fcmUrl, $payload);

                info([ 'Authorization' => 'key=' . $this->serverKey, $this->fcmUrl, $payload]);

                if ($response->successful()) {
                    $results[] = ['device_id' => $device->id, 'status' => 'sent'];
                } else {
                    $responseData = $response->json();

                    // Check if token is invalid
                    if (isset($responseData['results'][0]['error'])) {
                        $error = $responseData['results'][0]['error'];

                        if (in_array($error, ['NotRegistered', 'InvalidRegistration'])) {
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

    /**
     * Send to multiple tokens at once (more efficient)
     */
    public function sendToMultipleTokens($tokens, $title, $message, $data = [])
    {
        try {
            $payload = [
                'registration_ids' => $tokens, // Array of tokens
                'notification' => [
                    'title' => $title,
                    'body' => $message,
                    'sound' => 'default',
                    'badge' => '1',
                ],
                'data' => $data,
                'priority' => 'high',
            ];

            $response = Http::withHeaders([
                'Authorization' => 'key=' . $this->serverKey,
                'Content-Type' => 'application/json',
            ])->post($this->fcmUrl, $payload);

            return [
                'success' => $response->successful(),
                'response' => $response->json()
            ];

        } catch (\Exception $e) {
            Log::error('FCM Batch Send Error', [
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}