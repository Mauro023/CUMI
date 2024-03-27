<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCumiLabRatesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cumi_lab_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('period');
            $table->decimal('january', 12, 2)->nullable();
            $table->decimal('february', 12, 2)->nullable();
            $table->decimal('march', 12, 2)->nullable();
            $table->decimal('april', 12, 2)->nullable();
            $table->decimal('june', 12, 2)->nullable();
            $table->decimal('july', 12, 2)->nullable();
            $table->decimal('august', 12, 2)->nullable();
            $table->decimal('october', 12, 2)->nullable();
            $table->decimal('november', 12, 2)->nullable();
            $table->decimal('december', 12, 2)->nullable();
            $table->decimal('total_months', 12, 2)->nullable();
            $table->decimal('average_months', 12, 2)->nullable();
            $table->decimal('cumilab_rate', 12, 2);
            $table->decimal('mutual_rate', 12, 2);
            $table->decimal('pxq', 12, 2)->nullable();
            $table->decimal('part_percentage', 12, 2)->nullable();
            $table->decimal('adminlog_percentage', 12, 2)->nullable();
            $table->decimal('cd_percentage', 12, 2)->nullable();
            $table->decimal('total', 12, 2)->nullable();
            $table->string('cups');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cups')->references('cups')->on('procedures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cumi_lab_rates');
    }
}
