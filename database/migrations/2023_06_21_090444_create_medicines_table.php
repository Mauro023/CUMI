<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id('id');
            $table->date('admission_date');
            $table->integer('act_number');
            $table->string('generic_name');
            $table->string('tradename');
            $table->string('concentration');
            $table->string('pharmaceutical_form');
            $table->string('presentation');
            $table->date('expiration_date');
            $table->string('lot_number');
            $table->string('health_register');
            $table->date('registration_validity');
            $table->string('observation_record');
            $table->string('manufacturer_laboratory');
            $table->string('supplier');
            $table->string('invoice_number');
            $table->integer('received_amount');
            $table->string('purchase_order');
            $table->string('entered_by');
            $table->integer('sample');
            $table->string('lettering');
            $table->string('packing');
            $table->string('laminate');
            $table->string('closing');
            $table->string('all');
            $table->string('liquids');
            $table->string('semisolid');
            $table->string('dust');
            $table->string('tablet');
            $table->string('capsule');
            $table->string('arrival_temperature');
            $table->string('observations');
            $table->string('state');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medicines');
    }
}
