<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArchivedAtToRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reminders', function (Blueprint $table) {
            $table->timestamp('archived_at')->nullable()->after('complete');
            $table->time('time')->nullable()->after('date'); // Store time (e.g., 20:00:00)
            $table->integer('alert_days_before')->default(0)->after('time'); // Days before alert
            // $table->integer('complete')->nullable()->change(); // In case you want to remove it later
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reminders', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn([
                'time',
                'alert_days_before',
                'archived_at'
            ]);

            // $table->integer('complete')->default(0)->change();
        });
    }
}
