<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordBudgetSpentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_budget_spents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('period')->default(date('Y-m-d'));
            $table->foreignId('allocation_id');
            $table->string('label');
            $table->double('amount')->default(0);
            $table->text('note')->nullable();
            $table->date('date')->default(date('Y-m-d'));
            $table->double('spent')->nullable();
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
        Schema::dropIfExists('record_budget_spents');
    }
}
