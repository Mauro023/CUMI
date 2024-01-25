<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurgeriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgeries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('start_time');
            $table->string('end_time');
            $table->integer('surgeryTime')->nullable();
            $table->string('operating_room');
            $table->integer('cod_surgical_act')->unsigned()->key();
            $table->integer('study_number');
            $table->integer('patient');
            $table->string('name_patient');
            $table->json('labours');
            $table->integer('id_doctor')->unsigned();
            $table->integer('id_doctor2')->unsigned()->nullable();
            $table->integer('id_anesthesiologist')->unsigned();
            $table->integer('id_procedures')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_doctor')->references('id')->on('doctors');
            $table->foreign('id_doctor2')->references('id')->on('doctors');
            $table->foreign('id_anesthesiologist')->references('id')->on('doctors');
            $table->foreign('id_procedures')->references('id')->on('procedures');
            $table->index('cod_surgical_act');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('surgeries');
    }
}
