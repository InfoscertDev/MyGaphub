<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtectionAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protection_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('protection_category');
            $table->string('protection_type');
            $table->string('details')->nullable();
            $table->string('provider_contact')->nullable();
            $table->string('provider_policy')->nullable();
            $table->integer('sum_assured')->default(0)->nullable();
            $table->integer('premium_pay')->default(0)->nullable();
            $table->integer('current_balance')->default(0)->nullable();
            $table->string('pay_frequency')->nullable(); 
 
            $table->integer('payment_type')->nullable();
            $table->date('cover_start')->nullable();
            $table->date('cover_end')->nullable();
            $table->string('document')->nullable();
            $table->string('extra')->nullable();
            $table->integer('other')->nullable();
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
        Schema::dropIfExists('protection_accounts');
    }
}
