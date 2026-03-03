<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeedBudgetAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seed_budget_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('period')->default(date('Y-m-d'));
            $table->string('seed_category');
            $table->string('label');
            $table->double('amount')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seed_budget_allocations');
    }
}
