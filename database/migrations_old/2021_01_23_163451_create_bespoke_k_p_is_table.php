<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBespokeKPIsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bespoke_kpis', function (Blueprint $table) {
            $table->increments('id');
            $table->user('user_id');
            $table->string('kpi_name');
            $table->string('bespoke_type');
            $table->string('savings_purposes')->nullable();
            $table->string('cash_keptin')->nullable();
            $table->integer('target')->default(0);
            $table->integer('baseline')->default(0);
            $table->integer('current')->default(0);
            $table->text('kpi_details')->nullable();

            $table->integer('dept_interest')->nullable();
            $table->string('dept_types')->nullable(); 
            $table->text('extra')->nullable();
            $table->integer('extra1')->nullable();
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
        Schema::dropIfExists('bespoke_k_p_is');
    }
}
