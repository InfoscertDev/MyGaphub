<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscretionaryBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discretionary_budgets', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('user_id');
            $table->double('charity');
            $table->double('family_support');
            $table->double('personal_commitments');
            $table->double('others');
            $table->string('extra')->nullable();
            $table->integer('other')->nullable();
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
        Schema::dropIfExists('discretionary_budgets');
    }
}
