<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentedEquipmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rented_equipments', function (Blueprint $table) {
            $table->id('id');
            $table->string('art_code');
            $table->string('description');
            $table->decimal('value');
            $table->string('specialty');
            $table->integer('procedure_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('procedure_id')->references('id')->on('procedures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rented_equipments');
    }
}
