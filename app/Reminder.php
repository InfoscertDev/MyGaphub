<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reminder extends Model
{
    use SoftDeletes;

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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Helper: Calculate due days from today
    public function getDueDaysAttribute()
    {
        $today = now()->startOfDay();
        $reminderDate = \Carbon\Carbon::parse($this->date . ' ' . $this->time)->startOfDay();
        return $reminderDate->diffInDays($today);
    }

    // Helper: Is reminder overdue?
    public function getIsOverdueAttribute()
    {
        return $this->date && \Carbon\Carbon::parse($this->date . ' ' . $this->time)->isPast();
    }

    // Helper: Get alert date
    public function getAlertDateAttribute()
    {
        if (!$this->date || !$this->alert_days_before) return null;
        return \Carbon\Carbon::parse($this->date . ' ' . $this->time)
            ->subDays($this->alert_days_before)
            ->format('Y-m-d H:i:s');
    }
}