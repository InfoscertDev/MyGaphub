<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaphubSectionTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaphub_section_trackers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('portfolio')->default(0);
            $table->integer('acquisition')->default(0);
            $table->integer('income_universe')->default(0);
            $table->integer('360')->default(0);
            $table->integer('retirement')->default(0);
            $table->integer('seveng_analytics')->default(0);
            $table->integer('bespoke_analytics')->default(0);
            $table->integer('action_plan')->default(0);
            $table->integer('seed')->default(0);
            $table->integer('reap_uk')->default(0);
            $table->integer('reap_us')->default(0);
            $table->integer('reap_nigeria')->default(0); 
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
        Schema::dropIfExists('gaphub_section_trackers');
    }
}
