<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_strategies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');                  // "Investment Name"
            $table->text('reason');                  // "Reason for Investing"
            $table->string('category');              // retirement | investment | cash | equity

             // Source: user->monthly_asset_growth_savings (existing User/Profile model)
            $table->unsignedTinyInteger('monthly_percent')->nullable(); // 10|25|50|100
            // Source: user->alpha_balance (existing User/Profile model)
            $table->unsignedTinyInteger('lumpsum_percent')->nullable(); // 10|25|50|100

            $table->timestamps();

            // Assumes users table exists from your existing auth setup
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
        Schema::dropIfExists('action_strategies');
    }
};
