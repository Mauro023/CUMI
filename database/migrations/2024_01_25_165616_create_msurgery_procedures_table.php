<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsurgeryProceduresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msurgery_procedures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->string('type');
            $table->integer('mcod_surgical_act')->unsigned();
            $table->integer('code_procedure')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('mcod_surgical_act')->references('mcod_surgical_act')->on('multiple_surgeries');
            $table->foreign('code_procedure')->references('id')->on('procedures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('msurgery_procedures');
    }
}
