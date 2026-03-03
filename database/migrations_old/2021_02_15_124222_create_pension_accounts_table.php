<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePensionAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pension_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('provider');
            $table->string('pension_type');
            $table->double('current');
            $table->double('assured_income');
            $table->integer('percentage_cos')->nullable();
            $table->integer('retirement_age');
            $table->date('dob');
            $table->integer('monthly_contribution')->nullable();
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
        Schema::dropIfExists('pension_accounts');
    }
}
