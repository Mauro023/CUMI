<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogOperationCostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_operation_costs', function (Blueprint $table) {
            $table->id('id');
            $table->integer('percentage_uvr');
            $table->string('time_procedure');
            $table->integer('doctor_percentage');
            $table->decimal('doctor_fees');
            $table->integer('anest_percentage');
            $table->decimal('anest_fees');
            $table->integer('total_uvr');
            $table->decimal('room_cost');
            $table->decimal('gases');
            $table->decimal('labour');
            $table->integer('cod_surgical_act')->unsigned();
            $table->integer('code_procedure')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cod_surgical_act')->references('cod_surgical_act')->on('surgeries');
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
        Schema::drop('log_operation_costs');
    }
}
