<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_templates', function (Blueprint $table) {
            $table->id();
            $table->string('slug'); // e.g., 're_engagement', 'monthly_review'
            $table->string('platform'); // 'ios' or 'android'
            $table->string('title');
            $table->text('body');
            $table->string('category')->default('primary'); // primary, success, warning, danger, info
            $table->string('type')->default('general'); // general, reminder, etc.
            $table->string('action')->nullable(); // Route/action for the notification
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['slug', 'platform']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_templates');
    }
}
