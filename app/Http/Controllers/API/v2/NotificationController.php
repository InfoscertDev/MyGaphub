<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;
use App\Models\UserDevice;

class NotificationController extends Controller
{
    /**
     * Store or update FCM token for authenticated user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function notificationToken(Request $request)
    {
        $user = $request->user();

        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'fcm_token' => 'required|string|max:255',
            'device_type' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Store or update the FCM token
            $device = UserDevice::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'fcm_token' => $request->fcm_token,
                ],
                [
                    'device_type' => $request->device_type,
                    'is_active' => true,
                    'last_used_at' => now(),
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'FCM token saved successfully',
                'data' => [
                    'device_id' => $device->id,
                    'fcm_token' => $device->fcm_token,
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save FCM token',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get all FCM tokens for authenticated user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTokens(Request $request)
    {
        $user = $request->user();

        try {
            $devices = UserDevice::where('user_id', $user->id)
                ->where('is_active', true)
                ->orderBy('last_used_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'FCM tokens retrieved successfully',
                'data' => [
                    'devices' => $devices->map(function ($device) {
                        return [
                            'id' => $device->id,
                            'fcm_token' => $device->fcm_token,
                            'device_type' => $device->device_type,
                            'last_used_at' => $device->last_used_at,
                        ];
                    }),
                    'count' => $devices->count()
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve FCM tokens',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get specific FCM token by device type
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTokenByDevice(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'device_type' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $device = UserDevice::where('user_id', $user->id)
                ->where('device_type', $request->device_type)
                ->where('is_active', true)
                ->latest('last_used_at')
                ->first();

            if (!$device) {
                return response()->json([
                    'success' => false,
                    'message' => 'No FCM token found for this device type',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'FCM token retrieved successfully',
                'data' => [
                    'id' => $device->id,
                    'fcm_token' => $device->fcm_token,
                    'device_type' => $device->device_type,
                    'last_used_at' => $device->last_used_at,
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve FCM token',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    /**
     * Delete FCM token (for logout)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteToken(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'fcm_token' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            UserDevice::where('user_id', $user->id)
                ->where('fcm_token', $request->fcm_token)
                ->delete();

            return response()->json([
                'success' => true,
                'message' => 'FCM token deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete FCM token',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * List notifications with pagination and filtering
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $perPage = $request->get('per_page', 20);
        $category = $request->get('category'); // Filter by category
        $type = $request->get('type'); // Filter by type

        $query = Notification::where('user_id', $user->id);

        if ($category) {
            $query->where('category', $category);
        }

        if ($type) {
            $query->where('type', $type);
        }

        $notifications = $query->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $notifications,
            'unread_count' => Notification::where('user_id', $user->id)
                ->where('seen', false)
                ->count()
        ], 200);
    }

    /**
     * Mark notification as read
     */
    public function markAsRead(Request $request, $id)
    {
        $user = $request->user();

        $notification = Notification::where('user_id', $user->id)
            ->where('id', $id)
            ->first();

        if (!$notification) {
            return response()->json([
                'success' => false,
                'message' => 'Notification not found'
            ], 404);
        }

        $notification->markAsRead();

        return response()->json([
            'success' => true,
            'message' => 'Notification marked as read',
            'data' => $notification
        ], 200);
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead(Request $request)
    {
        $user = $request->user();

        Notification::where('user_id', $user->id)
            ->where('seen', false)
            ->update([
                'seen' => true,
                'read_at' => now()
            ]);

        return response()->json([
            'success' => true,
            'message' => 'All notifications marked as read'
        ], 200);
    }

    /**
     * Delete a notification
     */
    public function deleteNotification(Request $request, $id)
    {
        $user = $request->user();

        $notification = Notification::where('user_id', $user->id)
            ->where('id', $id)
            ->first();

        if (!$notification) {
            return response()->json([
                'success' => false,
                'message' => 'Notification not found'
            ], 404);
        }

        $notification->delete();

        return response()->json([
            'success' => true,
            'message' => 'Notification deleted'
        ], 200);
    }

    /**
     * Log notification sent from mobile
     * Mobile sends FCM directly, then calls this to save history
     */
    public function logNotification(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            // 'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'category' => 'nullable|string|in:primary,success,warning,danger,info',
            'type' => 'nullable|string|max:50',
            'action' => 'nullable|string|max:255',
            'data' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Save notification to database for history
            $notification = Notification::create([
                'user_id' => $user->id,
                'title' => $request->title,
                'message' => $request->message,
                'action' => $request->action,
                'category' => $request->category ?? 'primary',
                'type' => $request->type ?? 'general',
                'data' => $request->data ?? [],
                'seen' => false,
                'received_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Notification logged successfully',
                'data' => [
                    'notification_id' => $notification->id,
                ]
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to log notification',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Batch log multiple notifications
     * For when mobile needs to log multiple notifications at once
     */
    public function logBatchNotifications(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'notifications' => 'required|array',
            // 'notifications.*.user_id' => 'required|exists:users,id',
            'notifications.*.title' => 'required|string|max:255',
            'notifications.*.message' => 'required|string',
            'notifications.*.category' => 'nullable|string',
            'notifications.*.type' => 'nullable|string',
            'notifications.*.action' => 'nullable|string',
            'notifications.*.data' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $notifications = [];
            foreach ($request->notifications as $notif) {
                $notifications[] = Notification::create([
                    'user_id' => $user->id,
                    'title' => $notif['title'],
                    'message' => $notif['message'],
                    'action' => $notif['action'] ?? null,
                    'category' => $notif['category'] ?? 'primary',
                    'type' => $notif['type'] ?? 'general',
                    'data' => $notif['data'] ?? [],
                    'seen' => false,
                    'received_at' => now(),
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Notifications logged successfully',
                'count' => count($notifications)
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to log notifications',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}