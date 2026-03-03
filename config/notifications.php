<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Notification Settings
    |--------------------------------------------------------------------------
    |
    | Configure various settings for the automated notification system
    |
    */

    /**
     * Maximum number of 7G validation reminders to send
     * After this limit, notifications will stop for that user
     */
    'seven_g_validation_max_reminders' => env('SEVEN_G_VALIDATION_MAX_REMINDERS', 10),

    /**
     * Re-engagement notification settings
     * Number of days of inactivity before sending re-engagement notification
     */
    're_engagement_days' => env('RE_ENGAGEMENT_DAYS', 7),

    /**
     * Financial calculation reminder settings
     * Number of days after registration to send reminder
     */
    'financial_calculation_reminder_days' => env('FINANCIAL_CALCULATION_REMINDER_DAYS', 3),

    /**
     * 7G completion reminder settings
     * Number of days after registration to send reminder
     */
    'seven_g_completion_reminder_days' => env('SEVEN_G_COMPLETION_REMINDER_DAYS', 3),

    /**
     * 7G validation reminder interval
     * Number of days between validation reminders
     */
    'seven_g_validation_reminder_interval' => env('SEVEN_G_VALIDATION_REMINDER_INTERVAL', 3),

    /**
     * Enable/Disable specific notification rules
     */
    'rules_enabled' => [
        're_engagement' => env('NOTIFICATION_RULE_RE_ENGAGEMENT', true),
        'monthly_review' => env('NOTIFICATION_RULE_MONTHLY_REVIEW', true),
        'financial_calculation' => env('NOTIFICATION_RULE_FINANCIAL_CALCULATION', true),
        'seven_g_completion' => env('NOTIFICATION_RULE_SEVEN_G_COMPLETION', true),
        'seven_g_validation' => env('NOTIFICATION_RULE_SEVEN_G_VALIDATION', true),
    ],

];