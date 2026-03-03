<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\NotificationRuleService;
use Illuminate\Support\Facades\Log;

class SendScheduledNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:send-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send scheduled notifications based on user activity tracking rules';

    protected $notificationRuleService;

    /**
     * Create a new command instance.
     */
    public function __construct(NotificationRuleService $notificationRuleService)
    {
        parent::__construct();
        $this->notificationRuleService = $notificationRuleService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting scheduled notification process...');
        Log::info('SendScheduledNotifications command started');

        try {
            $results = $this->notificationRuleService->processAllRules();

            $this->info('Notification processing completed:');
            $this->table(
                ['Rule', 'Notifications Sent'],
                [
                    ['Re-engagement', $results['re_engagement']],
                    ['Monthly Review', $results['monthly_review']],
                    ['Financial Calculation', $results['financial_calculation']],
                    ['7G Completion', $results['seven_g_completion']],
                    ['7G Validation', $results['seven_g_validation']],
                ]
            );

            $total = array_sum($results);
            $this->info("Total notifications sent: {$total}");
            Log::info('SendScheduledNotifications command completed', ['results' => $results]);

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Error processing notifications: ' . $e->getMessage());
            Log::error('SendScheduledNotifications command failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return Command::FAILURE;
        }
    }
}