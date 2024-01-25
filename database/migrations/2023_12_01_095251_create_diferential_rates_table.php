<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiferentialRatesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diferential_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rate_code');
            $table->string('rate_description');
            $table->decimal('value', 12, 2);
            $table->integer('id_procedures')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_procedure')->references('id')->on('procedures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('diferential_rates');
    }
}
