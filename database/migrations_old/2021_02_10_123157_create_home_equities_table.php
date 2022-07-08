<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeEquitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_equities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('location')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('equity_type')->nullable();
            $table->text('description')->nullable();
            $table->double('current_equity')->nullable();
            $table->double('purchase_cost')->nullable();
            $table->double('purchase_fund')->nullable();
            $table->double('market_value')->nullable();
            $table->integer('mortgage_id')->nullable();
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
        Schema::dropIfExists('home_equities');
    }
}
