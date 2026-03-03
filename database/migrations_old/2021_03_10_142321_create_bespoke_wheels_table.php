<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBespokeWheelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bespoke_wheels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bespoke_id');
            $table->string('account_type')->nullable();
            $table->text('account_details')->nullable();
            $table->string('account_alias')->nullable();
            $table->date('target_date')->nullable();

            $table->string('account_currency')->nullable();
            $table->integer('interest_rate')->nullable();
            $table->string('periodical_pay')->nullable();
            $table->text('creditor_name')->nullable();
            $table->text('historical_balances')->nullable();

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
        Schema::dropIfExists('bespoke_wheels');
    }
}
