<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('asset_category')->nullable();
            $table->string('asset_class')->nullable();
            $table->string('asset_type')->nullable();
            $table->string('asset_currency')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->double('asset_value')->nullable();
            $table->double('monthly_roi')->nullable();
            $table->double('credit_value')->nullable();
            $table->double('projected_market_value')->nullable();
            $table->integer('other')->nullable();
            $table->string('extra')->nullable();
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
        Schema::dropIfExists('portfolio_assets');
    }
}
