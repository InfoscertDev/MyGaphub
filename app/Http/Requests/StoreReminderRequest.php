<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class StoreReminderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'amount' => 'nullable|numeric',
            'date' => 'required|date|after:yesterday',
            'time' => 'required|date_format:H:i',
            'alert_days_before' => 'required|string',
            'note' => 'nullable|string',
            'extra' => 'nullable|string',
            'due' => 'nullable|string',
            'email' => 'nullable|boolean',
            'sms' => 'nullable|boolean',
            'push' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'date.after' => 'Reminder date must be after yesterday.',
            'time.date_format' => 'Time must be in HH:MM format (e.g., 20:00).',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $date = $this->date;
            $time = $this->time ?? '00:00';
            $alertOption = $this->alert_days_before;

            // Convert alert to minutes
            $alertMinutes = $this->convertAlertToMinutes($alertOption);

            $reminderDateTime = Carbon::createFromFormat('Y-m-d H:i', "$date $time");
            $alertDateTime = $reminderDateTime->copy()->subMinutes($alertMinutes);

            if (!$alertDateTime->isFuture() && !$alertDateTime->isToday()) {
                $validator->errors()->add('alert_days_before', 'Alert cannot be set for a past date.');
            }
        });
    }

    private function convertAlertToMinutes($alertOption)
    {
        if (is_numeric($alertOption)) {
            return (int) $alertOption;
        }

        if (empty($alertOption)) {
            return 5;
        }

        $option = strtolower(trim($alertOption));

        $alertMap = [
            'default' => 5,
            '5 minutes' => 5,
            '10 minutes' => 10,
            '30 minutes' => 30,
            '1 hour' => 60,
            '2 hours' => 120,
            '1 day' => 1440,
            '2 days' => 2880,
            '3 days' => 4320,
        ];

        if (array_key_exists($option, $alertMap)) {
            return $alertMap[$option];
        }

        preg_match('/(\d+)\s*(minute|hour|day)/', $option, $matches);

        if (count($matches) >= 3) {
            $value = (int) $matches[1];
            $unit = $matches[2];

            switch ($unit) {
                case 'minute':
                case 'minutes':
                    return $value;
                case 'hour':
                case 'hours':
                    return $value * 60;
                case 'day':
                case 'days':
                    return $value * 1440;
            }
        }

        return 5;
    }
}
