<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('time');
            $table->string('location');
            $table->date('recorded_at');
            $table->unsignedInteger('race_number_id');
            $table->unsignedInteger('classification_id');
            $table->string('athlete_name');
            $table->char('athlete_gender');
            $table->string('athlete_address');
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
        Schema::dropIfExists('records');
    }
}
