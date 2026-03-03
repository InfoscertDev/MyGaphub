<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('income_type', ['portfolio', 'non_portfolio']);
            $table->string('income_currency')->nullable();
            $table->double('amount')->nullable();
            $table->string('channel')->nullable();
            $table->string('income_name')->nullable();
            $table->string('income_frequency')->nullable();
            $table->integer('portfolio_asset_id')->nullable();
            $table->date('income_date')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('income_accounts');
    }
}
