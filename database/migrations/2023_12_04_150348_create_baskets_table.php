<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baskets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_quantity');
            $table->integer('reusable');
            $table->decimal('basket_value', 12, 2);
            $table->integer('id_article')->unsigned();
            $table->integer('surgical_act')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_article')->references('id')->on('articles');
            $table->foreign('surgical_act')->references('cod_surgical_act')->on('surgeries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('baskets');
    }
}
