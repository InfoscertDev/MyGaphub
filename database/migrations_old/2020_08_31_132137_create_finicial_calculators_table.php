<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinicialCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finicial_calculators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('currency')->nullable();
            $table->integer('mortgage')->default(0);
            $table->integer('mobility')->default(0);
            $table->integer('expenses')->default(0);
            $table->integer('utility')->default(0);
            $table->integer('dept_repay')->default(0);

            $table->integer('other_income')->default(0);
            $table->integer('extra_save')->default(0);
            $table->integer('roce')->default(0);
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
        Schema::dropIfExists('finicial_calculators');
    }
}
