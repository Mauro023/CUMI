<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagingProductionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imaging_productions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('go_study')->nullable();
            $table->integer('id_order')->nullable();
            $table->string('modality');
            $table->string('dni_patient');
            $table->string('name_patient');
            $table->string('income')->nullable();
            $table->string('contract')->nullable();
            $table->string('date');
            $table->string('hour');
            $table->integer('cod_medi')->unsigned();
            $table->string('cups');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cod_medi')->references('code')->on('doctors');
            $table->foreign('cups')->references('code')->on('procedures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('imaging_productions');
    }
}
