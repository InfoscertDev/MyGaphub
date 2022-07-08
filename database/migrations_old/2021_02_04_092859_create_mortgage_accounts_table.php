<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMortgageAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mortgage_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('creditor_name');
            $table->text('description')->nullable();
            $table->string('secured_against');
            $table->string('details')->nullable();
            $table->string('account_currency')->nullable();
            $table->integer('open_balance')->default(0)->nullable();
            $table->integer('current_balance')->default(0)->nullable();
            $table->integer('interest_rate')->nullable();
            $table->integer('monthly_pay')->nullable();
            $table->string('repayment_plan')->nullable(); 
            $table->integer('isResidecial')->default(0)->nullable();
            $table->integer('isAnalytics')->default(0)->nullable();
            $table->integer('today_current')->default(0)->nullable();
            $table->integer('mortgage_paid')->default(0)->nullable();
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
        Schema::dropIfExists('mortgage_accounts');
    }
}
