<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Reminder extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'amount',
        'note',
        'date',
        'time',
        'extra',
        'due',
        'email',
        'sms',
        'push',
        'archived_at',
        'alert_days_before' // This will now store minutes
    ];

    protected $dates = ['archived_at'];

    protected $appends = [
        'due_days',
        'is_overdue',
        'alert_date',
        'reminder_datetime',
        'is_past',
        'alert_human_readable' // New attribute for frontend
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the reminder datetime (date + time combined)
     */
    protected function getReminderDatetimeAttribute()
    {
        if (!$this->date || !$this->time) {
            return null;
        }

        try {
            // Try with seconds first (H:i:s)
            return Carbon::createFromFormat('Y-m-d H:i:s', "{$this->date} {$this->time}");
        } catch (\Exception $e) {
            try {
                // Try without seconds (H:i)
                return Carbon::createFromFormat('Y-m-d H:i', "{$this->date} {$this->time}");
            } catch (\Exception $e) {
                try {
                    // Last resort
                    return Carbon::parse("{$this->date} {$this->time}");
                } catch (\Exception $e) {
                    return null;
                }
            }
        }
    }

    public function getDueDaysAttribute()
    {
        $reminderDatetime = $this->reminder_datetime;
        if (!$reminderDatetime) return null;

        $today = now()->startOfDay();
        $reminderDate = $reminderDatetime->copy()->startOfDay();
        return $reminderDate->diffInDays($today);
    }

    public function getIsOverdueAttribute()
    {
        $reminderDatetime = $this->reminder_datetime;
        if (!$reminderDatetime) return false;
        return $reminderDatetime->isPast();
    }

    public function getAlertDateAttribute()
    {
        if (!$this->date || !$this->time || !$this->alert_days_before) return null;

        $reminderDatetime = $this->reminder_datetime;
        if (!$reminderDatetime) return null;

        // Convert minutes to Carbon interval
        return $reminderDatetime->copy()
            ->subMinutes($this->alert_days_before)
            ->format('Y-m-d H:i:s');
    }

    public function getIsPastAttribute()
    {
        return $this->getIsOverdueAttribute();
    }

    /**
     * New: Get human-readable alert time
     */
    public function getAlertHumanReadableAttribute()
    {
        if (!$this->alert_days_before) return 'Default (5 minutes)';

        $minutes = $this->alert_days_before;

        if ($minutes == 5) return 'Default (5 minutes)';
        if ($minutes == 10) return '10 minutes before';
        if ($minutes == 30) return '30 minutes before';
        if ($minutes == 60) return '1 hour before';
        if ($minutes == 120) return '2 hours before';
        if ($minutes == 1440) return '1 day before';
        if ($minutes == 2880) return '2 days before';
        if ($minutes == 4320) return '3 days before';

        // Generic fallback
        if ($minutes < 60) return "{$minutes} minutes before";
        if ($minutes < 1440) return floor($minutes / 60) . " hours before";
        return floor($minutes / 1440) . " days before";
    }

    public function scopePast($query)
    {
        return $query->where(function ($query) {
            $query->whereDate('date', '<', now()->toDateString())
                  ->orWhere(function ($query) {
                      $query->whereDate('date', '=', now()->toDateString())
                            ->whereTime('time', '<', now()->format('H:i:s'));
                  });
        });
    }

    public function scopeUpcoming($query)
    {
        return $query->where(function ($query) {
            $query->whereDate('date', '>', now()->toDateString())
                  ->orWhere(function ($query) {
                      $query->whereDate('date', '=', now()->toDateString())
                            ->whereTime('time', '>=', now()->format('H:i:s'));
                  });
        });
    }

    public function scopeActive($query)
    {
        return $query->whereNull('archived_at');
    }

    public function scopeArchived($query)
    {
        return $query->whereNotNull('archived_at');
    }

    public function scopeDueToday($query)
    {
        return $query->whereDate('date', now()->toDateString());
    }

    public function scopeDueThisWeek($query)
    {
        $startOfWeek = now()->startOfWeek()->toDateString();
        $endOfWeek = now()->endOfWeek()->toDateString();
        return $query->whereBetween('date', [$startOfWeek, $endOfWeek]);
    }

    public function shouldTriggerAlert(): bool
    {
        if (!$this->alert_days_before) return false;

        $reminderDatetime = $this->reminder_datetime;
        if (!$reminderDatetime) return false;

        $alertDateTime = $reminderDatetime->copy()->subMinutes($this->alert_days_before);
        $now = now();

        return $alertDateTime->isPast() && $alertDateTime->diffInMinutes($now) <= 1;
    }
}
