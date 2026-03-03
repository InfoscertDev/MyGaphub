<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoloAssetRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolo_asset_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('portfolio_asset_id');
            $table->date('period')->default(date('Y-m-d'));
            $table->double('amount')->default(0);
            $table->double('revenue')->default(0);
            $table->double('management')->default(0);
            $table->double('taxes')->default(0); 
            $table->double('maintenance')->default(0);
            $table->double('others')->default(0);
            $table->double('net_income')->default(0);
            $table->text('maintenance_details')->nullable();
            $table->text('note')->nullable();
            $table->text('note2')->nullable();
            $table->text('extra')->nullable();
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
        Schema::dropIfExists('portfolo_asset_records');
    }
}
