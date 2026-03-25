<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserActivityTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'last_app_open',
        'last_monthly_review_sent',
        'financial_calculation_completed_at',
        'financial_calculation_reminder_sent',
        'seven_g_completed_at',
        'seven_g_reminder_sent',
        'seven_g_last_validated_at',
        'seven_g_validation_reminder_sent',
        'seven_g_validation_reminder_count',
    ];

    protected $casts = [
        'last_app_open' => 'datetime',
        'last_monthly_review_sent' => 'datetime',
        'financial_calculation_completed_at' => 'datetime',
        'financial_calculation_reminder_sent' => 'datetime',
        'seven_g_completed_at' => 'datetime',
        'seven_g_reminder_sent' => 'datetime',
        'seven_g_last_validated_at' => 'datetime',
        'seven_g_validation_reminder_sent' => 'datetime',
    ];

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Update last app open timestamp
     */
    public function updateLastAppOpen()
    {
        $this->update(['last_app_open' => now()]);
    }

    /**
     * Mark financial calculation as completed
     */
    public function markFinancialCalculationCompleted()
    {
        $this->update(['financial_calculation_completed_at' => now()]);
    }

    /**
     * Mark 7G as completed
     */
    public function markSevenGCompleted()
    {
        $this->update(['seven_g_completed_at' => now()]);
    }

    /**
     * Update 7G validation timestamp
     */
    public function updateSevenGValidation()
    {
        $this->update([
            'seven_g_last_validated_at' => now(),
            'seven_g_validation_reminder_count' => 0 // Reset counter on validation
        ]);
    }

    /**
     * Check if user needs re-engagement notification (inactive for 7 days)
     */
    public function needsReEngagement()
    {
        if (!$this->last_app_open) {
            return false; // Never opened app, handled differently
        }

        return $this->last_app_open->lt(Carbon::now()->subDays(7));
    }

    /**
     * Check if user needs monthly review notification
     */
    public function needsMonthlyReview()
    {
        $today = Carbon::now();

        // Check if it's the 1st of the month
        if ($today->day !== 1) {
            return false;
        }

        // Check if we already sent this month
        if ($this->last_monthly_review_sent &&
            $this->last_monthly_review_sent->isSameMonth($today)) {
            return false;
        }

        return true;
    }

    /**
     * Check if user needs financial calculation reminder
     */
    public function needsFinancialCalculationReminder()
    {
        // Already completed
        if ($this->financial_calculation_completed_at) {
            return false;
        }

        // Check if 3 days have passed since user creation
        $user = $this->user;
        if (!$user || $user->created_at->gt(Carbon::now()->subDays(3))) {
            return false;
        }

        // Check if we already sent reminder in last 3 days
        if ($this->financial_calculation_reminder_sent &&
            $this->financial_calculation_reminder_sent->gt(Carbon::now()->subDays(3))) {
            return false;
        }

        return true;
    }

    /**
     * Check if user needs 7G completion reminder
     */
    public function needsSevenGReminder()
    {
        // Already completed
        if ($this->seven_g_completed_at) {
            return false;
        }

        // Check if 3 days have passed since user creation
        $user = $this->user;
        if (!$user || $user->created_at->gt(Carbon::now()->subDays(3))) {
            return false;
        }

        // Check if we already sent reminder in last 3 days
        if ($this->seven_g_reminder_sent &&
            $this->seven_g_reminder_sent->gt(Carbon::now()->subDays(3))) {
            return false;
        }

        return true;
    }

    /**
     * Check if user needs 7G validation reminder
     */
    public function needsSevenGValidationReminder()
    {
        $maxReminders = config('notifications.seven_g_validation_max_reminders', 10);

        // Check if max reminders reached
        if ($this->seven_g_validation_reminder_count >= $maxReminders) {
            return false;
        }

        // Check if last validation was done
        if ($this->seven_g_last_validated_at &&
            $this->seven_g_last_validated_at->gt(Carbon::now()->subDays(3))) {
            return false;
        }

        // Check if we already sent reminder in last 3 days
        if ($this->seven_g_validation_reminder_sent &&
            $this->seven_g_validation_reminder_sent->gt(Carbon::now()->subDays(3))) {
            return false;
        }

        return true;
    }
}