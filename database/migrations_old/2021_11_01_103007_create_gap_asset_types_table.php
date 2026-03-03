<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGapAssetTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gap_asset_types', function (Blueprint $table) {
            $table->id();
            $table->integer('acqusition_id')->nullable();
            $table->string('acqusition')->nullable(); 
            $table->string('name'); 
            $table->text('description')->nullable(); 
            $table->integer('status')->default(1); 
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
        Schema::dropIfExists('gap_asset_types');
    }
}
