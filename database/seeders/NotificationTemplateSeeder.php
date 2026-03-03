<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationTemplate;

class NotificationTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            // Rule 1: Re-engagement notification
            [
                'slug' => 're_engagement',
                'platform' => 'ios',
                'title' => 'Been a while 👋',
                'body' => 'Check in on your finances and see how you\'re tracking towards financial independence today.',
                'category' => 'info',
                'type' => 'reminder',
                'action' => 'dashboard',
                'is_active' => true,
            ],
            [
                'slug' => 're_engagement',
                'platform' => 'android',
                'title' => 'Been a while, let\'s check in',
                'body' => 'MyGAPhub app helps you stay strategic with your finances. Review your progress towards financial independence today.',
                'category' => 'info',
                'type' => 'reminder',
                'action' => 'dashboard',
                'is_active' => true,
            ],

            // Rule 2: Monthly finance review reminder
            [
                'slug' => 'monthly_review',
                'platform' => 'ios',
                'title' => 'Happy new month 🎉',
                'body' => 'Review last month\'s money flow and make smart adjustments to stay on track for financial independence.',
                'category' => 'success',
                'type' => 'reminder',
                'action' => 'analytics',
                'is_active' => true,
            ],
            [
                'slug' => 'monthly_review',
                'platform' => 'android',
                'title' => 'New month, fresh perspective',
                'body' => 'A new month is a good time to be intentional. Review your money flow from last month and adjust to stay on track.',
                'category' => 'success',
                'type' => 'reminder',
                'action' => 'analytics',
                'is_active' => true,
            ],

            // Rule 3: Incomplete financial calculation reminder
            [
                'slug' => 'financial_calculation_reminder',
                'platform' => 'ios',
                'title' => 'You\'re on your way 🚀',
                'body' => 'Complete your workflow to calculate your financial independence status in myGAPhub.',
                'category' => 'warning',
                'type' => 'reminder',
                'action' => 'financial_calculator',
                'is_active' => true,
            ],
            [
                'slug' => 'financial_calculation_reminder',
                'platform' => 'android',
                'title' => 'You\'re on your path to independence',
                'body' => 'Finish your workflow in myGAPhub to calculate your financial independence status and unlock smarter insights.',
                'category' => 'warning',
                'type' => 'reminder',
                'action' => 'financial_calculator',
                'is_active' => true,
            ],

            // Rule 4: Incomplete 7G questions reminder
            [
                'slug' => 'seven_g_completion_reminder',
                'platform' => 'ios',
                'title' => 'You\'re making great progress',
                'body' => 'Complete the 7G Solution to monitor your financial health and stay in control.',
                'category' => 'warning',
                'type' => 'reminder',
                'action' => 'seven_g',
                'is_active' => true,
            ],
            [
                'slug' => 'seven_g_completion_reminder',
                'platform' => 'android',
                'title' => 'Track your financial health effectively',
                'body' => 'Use the 7G Solution in myGAPhub to monitor your financial health and make informed decisions.',
                'category' => 'warning',
                'type' => 'reminder',
                'action' => 'seven_g',
                'is_active' => true,
            ],

            // Rule 5: 7G Validation reminder
            [
                'slug' => 'seven_g_validation_reminder',
                'platform' => 'ios',
                'title' => 'Your insights matter',
                'body' => 'Review and validate your Analytics data to get a clearer picture of your financial health.',
                'category' => 'info',
                'type' => 'reminder',
                'action' => 'analytics',
                'is_active' => true,
            ],
            [
                'slug' => 'seven_g_validation_reminder',
                'platform' => 'android',
                'title' => 'Turn data into better decisions',
                'body' => 'Validate all items in your Analytics section to complete your financial health tracking in myGAPhub.',
                'category' => 'info',
                'type' => 'reminder',
                'action' => 'analytics',
                'is_active' => true,
            ],
        ];

        foreach ($templates as $template) {
            NotificationTemplate::updateOrCreate(
                [
                    'slug' => $template['slug'],
                    'platform' => $template['platform'],
                ],
                $template
            );
        }

        $this->command->info('Notification templates seeded successfully!');
    }
}
