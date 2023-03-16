<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('entry_time');
            $table->string('departure_time');
            $table->integer('minutes');
            $table->integer('id_employe')->unsigned();
            $table->string('workday')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_employe')->references('id')->on('employes');
            $table->foreign('workday')->references('id')->on('calendars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attendances');
    }
}
