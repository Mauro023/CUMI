<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('dni');
            $table->string('full_name');
            $table->string('specialty');
            $table->integer('id_fees')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_fees')->references('honorary_code')->on('medical_fees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctors');
    }
}
