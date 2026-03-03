<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGapCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gap_currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('choice')->default('system');
            $table->string('base')->default('EUR');
            $table->date('last_update')->default(date('Y-m-d'));
            $table->longText('currencies')->nullable();
            $table->text('other_currencies')->nullable();
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
        Schema::dropIfExists('gap_currencies');
    }
}
