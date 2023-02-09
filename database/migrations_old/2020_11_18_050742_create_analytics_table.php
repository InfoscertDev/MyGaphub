<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('section');
            $table->string('name')->nullable();

            $table->text('stage1')->nullable();
            $table->text('stage2')->nullable();
            $table->text('stage3')->nullable();
            $table->text('stage4')->nullable();
            $table->text('stage5')->nullable();

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
        Schema::dropIfExists('analytics');
    }
}
