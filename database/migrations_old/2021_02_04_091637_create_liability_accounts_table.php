<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiabilityAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liability_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('creditor_name');
            $table->string('account_type');
            $table->text('account_details')->nullable();
            $table->string('account_currency')->nullable();
            $table->integer('baseline')->default(0)->nullable();
            $table->integer('current')->default(0)->nullable();
            $table->integer('target')->default(0)->nullable();
            $table->integer('interest_rate')->nullable();
            $table->integer('periodical_pay')->nullable();
            $table->date('target_date')->nullable();
            $table->integer('isAnalytics')->default(0)->nullable();
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
        Schema::dropIfExists('liability_accounts');
    }
}
