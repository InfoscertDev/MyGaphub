<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsappVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->index();
            $table->string('otp', 6);
            $table->boolean('is_verified')->default(false);
            $table->timestamp('otp_expires_at');
            $table->timestamp('verified_at')->nullable();
            $table->string('message_id')->nullable(); // WhatsApp message ID
            $table->json('meta_response')->nullable(); // Store Meta API response
            $table->integer('attempts')->default(0); // Track verification attempts
            $table->timestamps();

            // Index for efficient queries
            $table->index(['phone_number', 'is_verified']);
            $table->index(['phone_number', 'otp_expires_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatsapp_verifications');
    }
}
