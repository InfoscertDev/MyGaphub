<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_audits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('net_confirm')->nullable();
            $table->text('reap_favourite')->nullable();
            $table->text('ganp_favourite')->nullable();
            $table->text('wheel_point_at')->nullable();
            $table->text('accounts')->nullable(); 
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
        Schema::dropIfExists('user_audits');
    }
}
