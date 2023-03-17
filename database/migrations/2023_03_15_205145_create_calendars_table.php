<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('workday');
            $table->string('entry_time');
            $table->string('departure_time');
            $table->string('floor');
            $table->integer('id_employe')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_employe')->references('id')->on('employes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('calendars');
    }
}
