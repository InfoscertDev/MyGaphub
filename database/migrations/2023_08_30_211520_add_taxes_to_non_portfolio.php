<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTaxesToNonPortfolio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('non_portfolio_records', function (Blueprint $table) {
            $table->double("tithe")->default(0);
            $table->double("taxes")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('non_portfolio_records', function (Blueprint $table) {
            $table->dropColumn(['tithe', 'taxes']);
        });
    }
}
