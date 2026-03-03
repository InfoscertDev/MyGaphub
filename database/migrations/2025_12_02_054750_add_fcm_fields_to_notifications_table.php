<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFcmFieldsToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Add new columns
            $table->string('type')->default('general')->after('category'); // notification type
            $table->json('data')->nullable()->after('type'); // additional data for navigation
            $table->timestamp('read_at')->nullable()->after('received_at'); // when notification was read

            // $table->renameColumn('seen', 'is_read'); // Uncomment if you want to rename

            // Add indexes for better performance
            $table->index(['user_id', 'seen']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn(['type', 'data', 'read_at']);
            $table->dropIndex(['user_id', 'seen']);
            $table->dropIndex(['created_at']);
            // $table->renameColumn('is_read', 'seen');
        });
    }
}
