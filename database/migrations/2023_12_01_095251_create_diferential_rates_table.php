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
            $table->integer('fixed_amount');
            $table->integer('payment_availability');
            $table->decimal('value1', 12, 2);
            $table->decimal('value2', 12, 2);
            $table->string('observation_rates');
            $table->integer('id_procedures')->unsigned();
            $table->integer('id_doctor')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_procedure')->references('id')->on('procedures');
            $table->foreign('id_doctor')->references('code')->on('doctors');
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
