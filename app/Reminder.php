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
        'alert_days_before'
    ];

    protected $dates = ['archived_at'];

    // Add these attributes to the model's array/JSON output
    protected $appends = [
        'due_days',
        'is_overdue',
        'alert_date',
        'reminder_datetime',
        'is_past'
    ];

    // Prevent these from being stored in the database
    protected $hidden = [
        'reminder_datetime',
        'is_past'
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
        return Carbon::createFromFormat('Y-m-d H:i', "{$this->date} {$this->time}");
    }

    /**
     * Calculate due days from today
     */
    public function getDueDaysAttribute()
    {
        $today = now()->startOfDay();
        $reminderDate = $this->reminder_datetime->startOfDay();
        return $reminderDate->diffInDays($today);
    }

    /**
     * Check if reminder is overdue
     */
    public function getIsOverdueAttribute()
    {
        return $this->reminder_datetime->isPast();
    }

    /**
     * Get alert date
     */
    public function getAlertDateAttribute()
    {
        if (!$this->date || !$this->alert_days_before) return null;
        return $this->reminder_datetime
            ->subDays($this->alert_days_before)
            ->format('Y-m-d H:i:s');
    }

    /**
     * Check if reminder is in the past
     * Alias for is_overdue for better readability
     */
    public function getIsPastAttribute()
    {
        return $this->reminder_datetime->isPast();
    }

    /**
     * Scope for past reminders
     */
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

    /**
     * Scope for future reminders
     */
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

    /**
     * Scope for active (non-archived) reminders
     */
    public function scopeActive($query)
    {
        return $query->whereNull('archived_at');
    }

    /**
     * Scope for archived reminders
     */
    public function scopeArchived($query)
    {
        return $query->whereNotNull('archived_at');
    }

    /**
     * Scope for reminders due today
     */
    public function scopeDueToday($query)
    {
        return $query->whereDate('date', now()->toDateString());
    }

    /**
     * Scope for reminders due this week
     */
    public function scopeDueThisWeek($query)
    {
        $startOfWeek = now()->startOfWeek()->toDateString();
        $endOfWeek = now()->endOfWeek()->toDateString();

        return $query->whereBetween('date', [$startOfWeek, $endOfWeek]);
    }

    /**
     * Check if reminder should trigger alert
     */
    public function shouldTriggerAlert(): bool
    {
        if (!$this->alert_days_before) return false;

        $alertDateTime = $this->reminder_datetime->subDays($this->alert_days_before);
        $now = now();

        // Trigger alert if current time is within the same minute as alert time
        return $alertDateTime->isPast() &&
               $alertDateTime->diffInMinutes($now) <= 1;
    }
}