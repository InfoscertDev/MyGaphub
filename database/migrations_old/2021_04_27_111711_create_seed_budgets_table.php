<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeedBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seed_budgets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('period')->default(date('Y-m-d'));
            $table->double('investment_fund')->default('0');
            $table->double('personal_fund')->default('0');
            $table->double('emergency_fund')->default('0');
            $table->double('financial_training')->default('0');
            $table->double('career_development')->default('0');
            $table->double('mental_development')->default('0');
            $table->double('accomodation')->default('0');
            $table->double('mobility')->default('0');
            $table->double('expenses')->default('0');
            $table->double('utilities')->default('0');
            $table->double('debt_repay')->default('0');
            $table->double('charity')->default('0');
            $table->double('family_support')->default('0');
            $table->double('personal_commitments')->default('0');
            $table->double('others')->default('0'); 
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
        Schema::dropIfExists('seed_budgets');
    }
}
