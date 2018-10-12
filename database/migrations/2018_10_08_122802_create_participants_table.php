<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('athlete_id');
            $table->integer('turn');
            $table->integer('track');
            $table->integer('team')->nullable();
            $table->integer('pra_event_time')->nullable();
            $table->integer('result_time')->nullable();
            $table->string('medal')->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('participants');
    }
}
