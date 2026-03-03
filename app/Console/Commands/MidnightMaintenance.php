<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Reminder;
use Illuminate\Support\Facades\Log;

class MidnightMaintenance extends Command
{
    protected $signature = 'maintenance:midnight';
    protected $description = 'Archive past reminders, refresh FX rates, and clean cache';

    public function handle()
    {
        Log::info('Midnight maintenance started');
        $this->info('Starting midnight maintenance...');

        try {
            // 1. Archive past reminders
            $archivedCount = $this->deletePastReminders();

            // 2. Refresh FX rates
            $this->refreshFXRates();

            // 3. Clean cache
            $this->cleanCache();

            Log::info("Midnight maintenance completed. Archived {$archivedCount} reminders.");
            $this->info("Midnight maintenance completed! Archived {$archivedCount} reminders.");

        } catch (\Exception $e) {
            Log::error('Midnight maintenance failed: ' . $e->getMessage());
            $this->error('Maintenance failed: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }

    /**
     * Archive past reminders that are not already archived
     */
    protected function archivePastReminders()
    {
        // Get past reminders that are not archived
        $pastReminders = Reminder::past()
            ->active()
            ->get();

        $count = 0;

        foreach ($pastReminders as $reminder) {
            try {
                $reminder->update([
                    'archived_at' => now(),
                    'push' => false, // Disable push notifications for archived reminders
                    'sms' => false,  // Disable SMS for archived reminders
                    'email' => false // Disable email for archived reminders
                ]);
                $count++;

                Log::info("Archived reminder ID: {$reminder->id} - {$reminder->name}");
            } catch (\Exception $e) {
                Log::error("Failed to archive reminder ID: {$reminder->id} - Error: " . $e->getMessage());
            }
        }

        Log::info("Archived {$count} past reminders.");
        $this->info("Archived {$count} reminders.");

        return $count;
    }

    protected function deletePastReminders()
    {
        $pastReminders = Reminder::past()
            ->active() // Only delete active reminders (not archived)
            ->get();

        $count = 0;
        $deletedIds = [];

        foreach ($pastReminders as $reminder) {
            try {
                // Log the reminder before deletion (optional)
                Log::info("Deleting past reminder ID: {$reminder->id} - {$reminder->name} - Date: {$reminder->date} {$reminder->time}");

                // Delete the reminder
                $reminder->delete();

                $deletedIds[] = $reminder->id;
                $count++;

            } catch (\Exception $e) {
                Log::error("Failed to delete reminder ID: {$reminder->id} - Error: " . $e->getMessage());
            }
        }

        Log::info("Deleted {$count} past reminders. IDs: " . implode(', ', $deletedIds));
        $this->info("Deleted {$count} past reminders.");

        return $count;
    }

    /**
     * Delete old archived reminders (older than 30 days)
     * Optional: Uncomment if you want to automatically delete old archived reminders
     */
    protected function deleteOldArchivedReminders()
    {
        $thresholdDate = now()->subDays(30);

        $count = Reminder::archived()
            ->where('archived_at', '<', $thresholdDate)
            ->delete();

        Log::info("Deleted {$count} old archived reminders (older than 30 days).");
        $this->info("Deleted {$count} old archived reminders.");

        return $count;
    }

    /**
     * Refresh FX rates
     */
    protected function refreshFXRates()
    {
        try {
            $cfx_rates = app(\App\Helper\IntegrationParties::class)->load_currency_converter();
            Log::info('FX rates refreshed successfully.');
            $this->info('FX rates refreshed successfully.');
        } catch (\Exception $e) {
            Log::error('FX rates refresh failed: ' . $e->getMessage());
            $this->error('FX rates refresh failed: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Clean cache
     */
    protected function cleanCache()
    {
        try {
            // Clear various caches
            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            \Illuminate\Support\Facades\Artisan::call('config:clear');
            \Illuminate\Support\Facades\Artisan::call('view:clear');


            Log::info('Cache cleared successfully.');
            $this->info('Cache cleared successfully.');
        } catch (\Exception $e) {
            Log::error('Cache clearing failed: ' . $e->getMessage());
            $this->error('Cache clearing failed: ' . $e->getMessage());
            throw $e;
        }
    }
}