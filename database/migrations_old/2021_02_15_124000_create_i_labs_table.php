<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateILabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_labs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->double('investment')->default(0);
            $table->double('equity')->default(0);
            $table->double('savings')->default(0);
            $table->double('credit')->default(0);
            $table->double('mortgage')->default(0);
            $table->double('non_portfolio')->default(0);
            $table->double('asset_portfolio')->default(0);
            $table->double('peiodic_savings')->default(0);
            $table->double('education')->default(0);
            $table->double('expenditure')->default(0);
            $table->double('discretionary')->default(0);
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
        Schema::dropIfExists('i_labs');
    }
}
