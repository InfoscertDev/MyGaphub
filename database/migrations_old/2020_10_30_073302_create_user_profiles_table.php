<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('ancesry')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->string('extra')->nullable();
            $table->integer('extra2')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
