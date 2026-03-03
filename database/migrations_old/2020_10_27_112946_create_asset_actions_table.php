<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('asset_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); 
            $table->date('date');
            $table->text('note')->nullable();
            $table->string('file')->nullable();
            $table->string('action')->nullable();
            $table->string('extra')->nullable();
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
        Schema::dropIfExists('asset_actions');
    }
}
