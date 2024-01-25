<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralCostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('value_roomTime', 12, 2);
            $table->decimal('value_gases', 12, 2);
            $table->decimal('value_operatingRoom', 12, 2);
            $table->decimal('value_RoomCardio', 12, 2);
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
        Schema::drop('general_costs');
    }
}
