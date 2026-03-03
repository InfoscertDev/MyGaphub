<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotificationTemplate;
use App\User;
use App\Services\FCMService;
use Illuminate\Support\Facades\Validator;

use function Psy\info;

class AdminNotificationController extends Controller
{
    protected $fcmService;

    public function __construct(FCMService $fcmService)
    {
        $this->fcmService = $fcmService;
    }

    /**
     * Display notification templates list
     */
    public function index()
    {
        $templates = NotificationTemplate::orderBy('slug')
            ->orderBy('platform')
            ->get()
            ->groupBy('slug');

        return view('admin.notifications.index', compact('templates'));
    }

    /**
     * Show the form for editing a notification template
     */
    public function edit($id)
    {
        $template = NotificationTemplate::findOrFail($id);

        $categories = ['primary', 'success', 'warning', 'danger', 'info'];
        $types = ['general', 'reminder', 'order', 'payment', 'system', 'promotional'];

        return view('admin.notifications.edit', compact('template', 'categories', 'types'));
    }

    /**
     * Update notification template
     */
    public function update(Request $request, $id)
    {
        $template = NotificationTemplate::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'required|string|in:primary,success,warning,danger,info',
            'type' => 'required|string|max:50',
            'action' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $template->update([
            'title' => $request->title,
            'body' => $request->body,
            'category' => $request->category,
            'type' => $request->type,
            'action' => $request->action,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('notifications.index')
            ->with('success', 'Notification template updated successfully!');
    }

    /**
     * Show form for sending system/maintenance notification
     */
    public function createSystemNotification()
    {
        $categories = ['primary', 'success', 'warning', 'danger', 'info'];

        return view('admin.notifications.system', compact('categories'));
    }

    /**
     * Send system/maintenance notification to all users
     */
    public function sendSystemNotification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'category' => 'required|string|in:primary,success,warning,danger,info',
            'label' => 'nullable|string|max:55',
            'action' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Get all users
        $users = User::whereNotNull('email_verified_at')->get();
        $userIds = $users->pluck('id')->toArray();

        // Send notification to all users
        $results = $this->fcmService->sendToMultipleUsers(
            $userIds,
            $request->title,
            $request->message,
            $request->category,
            'system',
            $request->action,
            [
                'notification_type' => 'system',
                'sent_by_admin' => true,
                'label' => $request->label
            ]
        );

        $successCount = collect($results)->filter(function($result) {
            return $result['success'] ?? false;
        })->count();

        return redirect()->route('notifications.index')
            ->with('success', "System notification sent to {$successCount} users successfully!");
    }

    /**
     * Show form for sending promotional notification
     */
    public function createPromotionalNotification()
    {
        $categories = ['primary', 'success', 'warning', 'danger', 'info'];

        return view('admin.notifications.promotional', compact('categories'));
    }

    /**
     * Send promotional notification to all users or selected users
     */
    public function sendPromotionalNotification(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'category' => 'required|string|in:primary,success,warning,danger,info',
            'action' => 'nullable|string|max:255',
            'label' => 'nullable|string|max:55',
            'target_audience' => 'required|string|in:all,active,inactive',
        ]);

        if ($validator->fails()) {
            info('Validation failed', [
                'errors' => $validator->errors()->toArray(),
                'input'  => request()->all(),
            ]);

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        // Get users based on target audience
        $query = User::query();

        if ($request->target_audience === 'active') {
            // Users who opened app in last 7 days
            $query->whereHas('activityTracking', function($q) {
                $q->where('last_app_open', '>=', now()->subDays(7));
            });
        } elseif ($request->target_audience === 'inactive') {
            // Users who haven't opened app in last 7 days
            $query->whereHas('activityTracking', function($q) {
                $q->where('last_app_open', '<', now()->subDays(7))
                  ->orWhereNull('last_app_open');
            });
        }

        $users = $query->get();
        $userIds = $users->pluck('id')->toArray();

        if (empty($userIds)) {
            return redirect()->back()
                ->with('warning', 'No users found matching the target audience.');
        }

        // Send notification
        $results = $this->fcmService->sendToMultipleUsers(
            $userIds,
            $request->title,
            $request->message,
            $request->category,
            'promotional',
            $request->action,
            [
                'notification_type' => 'promotional',
                'target_audience' => $request->target_audience,
                'sent_by_admin' => true,
                'label' => $request->label
            ]
        );

        $successCount = collect($results)->filter(function($result) {
            return $result['success'] ?? false;
        })->count();

        return redirect()->route('notifications.index')
            ->with('success', "Promotional notification sent to {$successCount} users successfully!");
    }

    /**
     * Toggle template active status
     */
    public function toggleStatus($id)
    {
        $template = NotificationTemplate::findOrFail($id);
        $template->update(['is_active' => !$template->is_active]);

        return redirect()->back()
            ->with('success', 'Template status updated successfully!');
    }
}