<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seed_budget_allocations', function (Blueprint $table) {
            $table->date('period_end')->nullable();
            $table->string('expenditure')->nullable();
            $table->integer('status')->default(1);
            $table->integer('recuring')->default(1);
        });     
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seed_budget_allocations', function (Blueprint $table) {
            //
        });
    }
}
