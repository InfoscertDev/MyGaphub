<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reminder;
use Illuminate\Support\Facades\Validator;
use App\FinicialCalculator as Calculator;
use DateTime;
use Carbon\Carbon;

class ReminderAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $archive = $request->get('archive') === 'true'; // Boolean flag

        $calculate = Calculator::where('user_id', $user->id)->first();
        $currency = $calculate ? explode(" ", $calculate->currency)[0] : '£';

        $query = Reminder::where('user_id', $user->id);

        if ($archive) {
            $query->whereNotNull('archived_at');
        } else {
            $query->whereNull('archived_at');
        }

        $reminders = $query->latest()->paginate(20);

        // Add computed attributes
        foreach ($reminders as $reminder) {
            $reminder->due_days = $reminder->getDueDaysAttribute();
            $reminder->is_overdue = $reminder->getIsOverdueAttribute();
            $reminder->alert_date = $reminder->getAlertDateAttribute();
        }

        $data = [
            'reminders' => $reminders,
            'currency' => $currency,
            'archive' => $archive,
        ];

        return response()->json([
            'status' => true,
            'message' => 'Reminders fetched successfully.',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $user = $request->user();

        // Custom validator for alert timing
        Validator::extend('valid_alert', function ($attribute, $value, $parameters, $validator) {
            $date = $validator->getData()['date'];
            $time = $validator->getData()['time'] ?? '00:00';
            $alertDays = (int)$value;

            if ($alertDays < 0) return false;

            $reminderDateTime = Carbon::createFromFormat('Y-m-d H:i', "$date $time");
            $alertDateTime = $reminderDateTime->copy()->subDays($alertDays);

            return $alertDateTime->isFuture() || $alertDateTime->isToday();
        }, 'Alert cannot be set for past dates.');

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'amount' => 'numeric|min:0',
            'date' => 'required|date|after:yesterday',
            'time' => 'required|date_format:H:i',
            'alert_days_before' => 'required|integer|min:0|valid_alert',
            'note' => 'nullable|string',
            'extra' => 'nullable|string',
            'due' => 'nullable|string',
            'email' => 'boolean',
            'sms' => 'boolean',
            'push' => 'boolean',
        ], [
            'date.after' => 'Reminder date must be after yesterday.',
            'time.date_format' => 'Time must be in HH:MM format (e.g., 20:00).',
            'alert_days_before.valid_alert' => 'Alert cannot be set for a past date.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'data' => $validator->errors()
            ], 400);
        }

        $reminder = new Reminder();
        $reminder->user_id = $user->id;
        $reminder->name = $request->name;
        $reminder->amount = $request->amount;
        $reminder->date = $request->date;
        $reminder->time = $request->time;
        $reminder->note = $request->note;
        $reminder->extra = $request->extra;
        $reminder->due = $request->due;
        $reminder->email = (bool)$request->email;
        $reminder->sms = (bool)$request->sms;
        $reminder->push = (bool)$request->push;
        $reminder->alert_days_before = (int)$request->alert_days_before;
        $reminder->save();

        return response()->json([
            'status' => true,
            'message' => 'Reminder created successfully.',
            'data' => $reminder
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, $id)
    {
        $user = $request->user();
        $reminder = Reminder::where('user_id', $user->id)->findOrFail($id);

        $reminder->due_days = $reminder->getDueDaysAttribute();
        $reminder->is_overdue = $reminder->getIsOverdueAttribute();
        $reminder->alert_date = $reminder->getAlertDateAttribute();

        return response()->json([
            'status' => true,
            'message' => 'Reminder retrieved successfully.',
            'data' => $reminder
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $user = $request->user();

        // Mark as completed/archived
        if ($request->has('mark_as_completed') && $request->mark_as_completed === true) {
            $reminder = Reminder::where('user_id', $user->id)->findOrFail($id);
            $reminder->complete = 1;
            // $reminder->archived_at = now();
            $reminder->save();

            return response()->json([
                'status' => true,
                'message' => 'Reminder marked as completed and archived.',
                'data' => $reminder
            ]);
        }

        // Regular update
        Validator::extend('valid_alert', function ($attribute, $value, $parameters, $validator) {
            $date = $validator->getData()['date'];
            $time = $validator->getData()['time'] ?? '00:00';
            $alertDays = (int)$value;

            if ($alertDays < 0) return false;

            $reminderDateTime = Carbon::createFromFormat('Y-m-d H:i', "$date $time");
            $alertDateTime = $reminderDateTime->copy()->subDays($alertDays);

            return $alertDateTime->isFuture() || $alertDateTime->isToday();
        }, 'Alert cannot be set for past dates.');

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'amount' => 'numeric|min:0',
            'date' => 'required|date|after:yesterday',
            'time' => 'required|date_format:H:i',
            'alert_days_before' => 'required|integer|min:0|valid_alert',
            'note' => 'nullable|string',
            'extra' => 'nullable|string',
            'due' => 'nullable|string',
            'email' => 'boolean',
            'sms' => 'boolean',
            'push' => 'boolean',
        ], [
            'date.after' => 'Reminder date must be after yesterday.',
            'time.date_format' => 'Time must be in HH:MM format.',
            'alert_days_before.valid_alert' => 'Alert cannot be set for a past date.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'data' => $validator->errors()
            ], 400);
        }

        $reminder = Reminder::where('user_id', $user->id)->findOrFail($id);

        // Prevent editing if already archived
        if ($reminder->archived_at) {
            return response()->json([
                'status' => false,
                'message' => 'Cannot edit an archived reminder.',
                'data' => null
            ], 403);
        }

        $reminder->name = $request->name;
        $reminder->amount = $request->amount;
        $reminder->date = $request->date;
        $reminder->time = $request->time;
        $reminder->note = $request->note;
        $reminder->extra = $request->extra;
        $reminder->due = $request->due;
        $reminder->email = (bool)$request->email;
        $reminder->sms = (bool)$request->sms;
        $reminder->push = (bool)$request->push;
        $reminder->alert_days_before = (int)$request->alert_days_before;
        $reminder->save();

        return response()->json([
            'status' => true,
            'message' => 'Reminder updated successfully.',
            'data' => $reminder
        ]);
    }

    /**
     * Remove the specified resource from storage (Hard Delete).
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->forceDelete();

        return response()->json([
            'status' => true,
            'message' => 'Reminder permanently deleted.',
            'data' => null
        ]);
    }

    /**
     * Archive (Soft Delete) a reminder.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function archive(Request $request, $id)
    {
        $user = $request->user();
        $reminder = Reminder::where('user_id', $user->id)->findOrFail($id);

        if ($reminder->archived_at) {
            return response()->json([
                'status' => false,
                'message' => 'Reminder is already archived.',
                'data' => null
            ], 400);
        }

        $reminder->archived_at = now();
        $reminder->save();

        return response()->json([
            'status' => true,
            'message' => 'Reminder archived successfully.',
            'data' => $reminder
        ]);
    }

    /**
     * Restore an archived reminder.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(Request $request, $id)
    {
        $user = $request->user();
        $reminder = Reminder::where('user_id', $user->id)->withTrashed()->findOrFail($id);

        if (!$reminder->archived_at) {
            return response()->json([
                'status' => false,
                'message' => 'Reminder is not archived.',
                'data' => null
            ], 400);
        }

        $reminder->archived_at = null;
        $reminder->save();

        return response()->json([
            'status' => true,
            'message' => 'Reminder restored successfully.',
            'data' => $reminder
        ]);
    }
}
