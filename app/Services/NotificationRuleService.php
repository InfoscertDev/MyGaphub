<?php

namespace App\Services;

use App\User;
use App\FinicialCalculator;
use App\Models\UserActivityTracking;
use App\Models\NotificationTemplate;
use App\Helpers\AnalyticsClass;
use Illuminate\Support\Facades\Log;

class NotificationRuleService
{
    protected $fcmService;

    public function __construct(FCMService $fcmService)
    {
        $this->fcmService = $fcmService;
    }

    /**
     * Process all notification rules for all users
     */
    public function processAllRules()
    {
        $users = User::whereNotNull('email_verified_at')
                    ->get();

        $results = [
            're_engagement' => 0,
            'monthly_review' => 0,
            'financial_calculation' => 0,
            'seven_g_completion' => 0,
            'seven_g_validation' => 0,
        ];

        foreach ($users as $user) {
            // Ensure user has activity tracking record
            $tracking = UserActivityTracking::firstOrCreate(['user_id' => $user->id]);

            // Rule 1: Re-engagement
            if ($tracking->needsReEngagement()) {
                $this->sendReEngagementNotification($user, $tracking);
                $results['re_engagement']++;
            }

            // Rule 2: Monthly review
            if ($tracking->needsMonthlyReview()) {
                $this->sendMonthlyReviewNotification($user, $tracking);
                $results['monthly_review']++;
            }

            // Rule 3: Financial calculation reminder
            if ($tracking->needsFinancialCalculationReminder()) {
                $this->sendFinancialCalculationReminder($user, $tracking);
                $results['financial_calculation']++;
            }

            // Rule 4: 7G completion reminder
            if ($tracking->needsSevenGReminder()) {
                $this->sendSevenGCompletionReminder($user, $tracking);
                $results['seven_g_completion']++;
            }

            // Rule 5: 7G validation reminder
            if ($tracking->needsSevenGValidationReminder()) {
                $this->sendSevenGValidationReminder($user, $tracking);
                $results['seven_g_validation']++;
            }
        }

        return $results;
    }

    /**
     * Rule 1: Send re-engagement notification
     */
    protected function sendReEngagementNotification(User $user, UserActivityTracking $tracking)
    {
        $template = NotificationTemplate::getTemplateForUser('re_engagement', $user->id);

        if (!$template) {
            Log::warning("Template 're_engagement' not found for user {$user->id}");
            return;
        }

        $this->fcmService->sendToUser(
            $user->id,
            $template->title,
            $template->body,
            $template->category,
            $template->type,
            $template->action,
            ['rule' => 're_engagement', 'platform' => $template->platform]
        );

        Log::info("Re-engagement notification sent to user {$user->id}");
    }

    /**
     * Rule 2: Send monthly review notification
     */
    protected function sendMonthlyReviewNotification(User $user, UserActivityTracking $tracking)
    {
        $template = NotificationTemplate::getTemplateForUser('monthly_review', $user->id);

        if (!$template) {
            Log::warning("Template 'monthly_review' not found for user {$user->id}");
            return;
        }

        $this->fcmService->sendToUser(
            $user->id,
            $template->title,
            $template->body,
            $template->category,
            $template->type,
            $template->action,
            [
                'rule' => 'monthly_review',
                'platform' => $template->platform
            ]
        );

        $tracking->update(['last_monthly_review_sent' => now()]);
        Log::info("Monthly review notification sent to user {$user->id}");
    }

    /**
     * Rule 3: Send financial calculation reminder
     */
    protected function sendFinancialCalculationReminder(User $user, UserActivityTracking $tracking)
    {
        // Check if financial calculation is truly incomplete
        if ($this->isFinancialCalculationComplete($user)) {
            $tracking->markFinancialCalculationCompleted();
            return;
        }

        $template = NotificationTemplate::getTemplateForUser('financial_calculation_reminder', $user->id);

        if (!$template) {
            Log::warning("Template 'financial_calculation_reminder' not found for user {$user->id}");
            return;
        }

        $this->fcmService->sendToUser(
            $user->id,
            $template->title,
            $template->body,
            $template->category,
            $template->type,
            $template->action,
            ['rule' => 'financial_calculation_reminder', 'platform' => $template->platform]
        );

        $tracking->update(['financial_calculation_reminder_sent' => now()]);
        Log::info("Financial calculation reminder sent to user {$user->id}");
    }

    /**
     * Rule 4: Send 7G completion reminder
     */
    protected function sendSevenGCompletionReminder(User $user, UserActivityTracking $tracking)
    {
        // Check if 7G is truly incomplete
        if($tracking->financial_calculation_completed_at) return;

        if (AnalyticsClass::isSevenGVal($user)) {
            $tracking->markSevenGCompleted();
            return;
        }


        $template = NotificationTemplate::getTemplateForUser('seven_g_completion_reminder', $user->id);

        if (!$template) {
            Log::warning("Template 'seven_g_completion_reminder' not found for user {$user->id}");
            return;
        }

        $this->fcmService->sendToUser(
            $user->id,
            $template->title,
            $template->body,
            $template->category,
            $template->type,
            $template->action,
            ['rule' => 'seven_g_completion_reminder', 'platform' => $template->platform]
        );

        $tracking->update(['seven_g_reminder_sent' => now()]);
        Log::info("7G completion reminder sent to user {$user->id}");
    }

    /**
     * Rule 5: Send 7G validation reminder
     */
    protected function sendSevenGValidationReminder(User $user, UserActivityTracking $tracking)
    {
        $template = NotificationTemplate::getTemplateForUser('seven_g_validation_reminder', $user->id);

        if (!$template) {
            Log::warning("Template 'seven_g_validation_reminder' not found for user {$user->id}");
            return;
        }

        $this->fcmService->sendToUser(
            $user->id,
            $template->title,
            $template->body,
            $template->category,
            $template->type,
            $template->action,
            ['rule' => 'seven_g_validation_reminder', 'platform' => $template->platform]
        );

        $tracking->update([
            'seven_g_validation_reminder_sent' => now(),
            'seven_g_validation_reminder_count' => $tracking->seven_g_validation_reminder_count + 1
        ]);

        Log::info("7G validation reminder sent to user {$user->id} (count: {$tracking->seven_g_validation_reminder_count})");
    }

    /**
     * Check if financial calculation is complete
     */
    protected function isFinancialCalculationComplete(User $user)
    {
        $calculator = FinicialCalculator::where('user_id', $user->id)->first();

        if (!$calculator) {
            return false;
        }

        // Check if all required fields are filled (non-zero or not null)
        $requiredFields = ['mortgage', 'mobility', 'expenses', 'utility', 'dept_repay', 'other_income', 'extra_save', 'roce'];

        foreach ($requiredFields as $field) {
            if ($calculator->$field === null) {
                return false;
            }
        }

        return true;
    }
}
