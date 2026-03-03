<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivityTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activity_trackings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();

            // Rule 1: Last app open tracking
            $table->timestamp('last_app_open')->nullable();

            // Rule 2: Monthly review reminder tracking
            $table->timestamp('last_monthly_review_sent')->nullable();

            // Rule 3: Financial calculation completion
            $table->timestamp('financial_calculation_completed_at')->nullable();
            $table->timestamp('financial_calculation_reminder_sent')->nullable();

            // Rule 4: 7G questions completion
            $table->timestamp('seven_g_completed_at')->nullable();
            $table->timestamp('seven_g_reminder_sent')->nullable();

            // Rule 5: 7G Validation tracking
            $table->timestamp('seven_g_last_validated_at')->nullable();
            $table->timestamp('seven_g_validation_reminder_sent')->nullable();
            $table->integer('seven_g_validation_reminder_count')->default(0);

            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_activity_trackings');
    }
}
