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
        Schema::create('action_strategy_investigations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('strategy_id');
            $table->text('opportunity_age')->nullable();      // "How old is this opportunity?"
            $table->text('investors_last_5yr')->nullable();   // "How many people have successfully invested..."
            $table->text('team_experience')->nullable();      // "How experienced are the team..."
            $table->text('customer_value')->nullable();       // "What customer value do they create..."
            $table->text('other_details')->nullable();        // "Any other details?"
            $table->timestamps();

            $table->foreign('strategy_id')->references('id')->on('action_strategies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_strategy_investigations');
    }
};
