<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginAttemptLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_attempt_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('total_attempt')->default(0);
            $table->integer('attempt_series')->default(0);
            $table->string('access_type')->nullable();
            $table->string('device')->nullable();
            $table->string('ip')->nullable();
            $table->string('location')->nullable();
            $table->date('period')->default(date('Y-m-d'));
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
        Schema::dropIfExists('login_attempt_logs');
    }
}
