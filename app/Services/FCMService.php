<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification as FCMNotification;
use App\Models\UserDevice;
use App\Models\Notification;

class FCMService
{
    protected $messaging;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount(config('firebase.credentials'));
        $this->messaging = $factory->createMessaging();
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

                $fcmMessage = CloudMessage::withTarget('token', $device->fcm_token)
                    ->withNotification(
                        FCMNotification::create($title, $message)
                    )
                    ->withData($fcmData);

                $this->messaging->send($fcmMessage);
                $results[] = ['device_id' => $device->id, 'status' => 'sent'];

            } catch (\Exception $e) {
                $results[] = [
                    'device_id' => $device->id,
                    'status' => 'failed',
                    'error' => $e->getMessage()
                ];

                // If token is invalid, deactivate it
                if (strpos($e->getMessage(), 'not-found') !== false ||
                    strpos($e->getMessage(), 'invalid-registration-token') !== false) {
                    $device->update(['is_active' => false]);
                }
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
