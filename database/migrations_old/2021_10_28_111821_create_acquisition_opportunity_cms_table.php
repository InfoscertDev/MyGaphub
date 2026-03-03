<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcquisitionOpportunityCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acquisition_opportunity_cms', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('acquision_id')->default(0);
            $table->string('category')->unique();
            $table->string('fullname')->nullable();
            $table->text('country')->nullable();
            $table->text('capital')->nullable();
            $table->text('roi')->nullable(); 
            $table->text('photo')->nullable();
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
        Schema::dropIfExists('acquisition_opportunity_cms');
    }
}
