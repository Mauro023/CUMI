<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoatGroupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soat_groups', function (Blueprint $table) {
            $table->id('id');
            $table->integer('group');
            $table->decimal('surgeon');
            $table->decimal('anesthed');
            $table->decimal('assistant');
            $table->decimal('room');
            $table->decimal('materials');
            $table->decimal('total');
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
        Schema::drop('soat_groups');
    }
}
