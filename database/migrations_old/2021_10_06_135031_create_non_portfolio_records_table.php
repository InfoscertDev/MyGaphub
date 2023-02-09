<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonPortfolioRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_portfolio_records', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');  
            $table->integer('income_id');
            $table->double('amount')->default(0);
            $table->double('others')->default(0);
            $table->date('period')->default(date('Y-m-d'));
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
        Schema::dropIfExists('non_portfolio_records');
    }
}
