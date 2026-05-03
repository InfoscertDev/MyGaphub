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
        Schema::create('action_strategy_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('strategy_id');
            $table->string('sub_category');   // e.g. private_pension, isa, business_asset, wholly_owned_home
            $table->text('note')->nullable(); // The text the user typed in the checklist field
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
        Schema::dropIfExists('action_strategy_items');
    }
};
