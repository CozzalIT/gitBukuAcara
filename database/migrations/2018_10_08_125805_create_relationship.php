<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('athletes', function (Blueprint $table) {
          $table->foreign('classification_id')
                ->references('id')->on('classifications')
                ->onDelete('cascade');
        });

        Schema::table('participants', function (Blueprint $table) {
          $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');

          $table->foreign('athlete_id')
                ->references('id')->on('athletes')
                ->onDelete('cascade');
        });

        Schema::table('athlete_race_numbers', function (Blueprint $table) {
          $table->foreign('athlete_id')
                ->references('id')->on('athletes')
                ->onDelete('cascade');
        });

        Schema::table('events', function (Blueprint $table) {
          $table->foreign('classification_id')
                ->references('id')->on('classifications')
                ->onDelete('cascade');

          $table->foreign('race_number_id')
                ->references('id')->on('race_numbers')
                ->onDelete('cascade');
        });

        Schema::table('event_records', function (Blueprint $table) {
          $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');

          $table->foreign('record_id')
                ->references('id')->on('records')
                ->onDelete('cascade');
        });

        Schema::table('records', function (Blueprint $table) {
          $table->foreign('race_number_id')
                ->references('id')->on('race_numbers')
                ->onDelete('cascade');

          $table->foreign('classification_id')
                ->references('id')->on('classifications')
                ->onDelete('cascade');
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
    }
}
