<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreedomFinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freedom_fins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->double('baseline')->default(0)->nullable();
            $table->double('current')->default(0)->nullable();
            $table->double('target')->default(0)->nullable();
            $table->double('main')->default(0)->nullable();

            $table->text('comment')->nullable();
            $table->text('strategy')->nullable();
            $table->string('extra')->nullable();
            $table->string('extra1')->nullable();
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
        Schema::dropIfExists('freedom_fins');
    }
}
