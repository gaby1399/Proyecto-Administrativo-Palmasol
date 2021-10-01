<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cal_gastos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');
            $table->unsignedBigInteger('material_id');
            $table->unsignedInteger('presupuesto_id');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('presupuesto_id')->references('id')->on('presupuestos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cal_gastos', function (Blueprint $table) {
            $table->dropForeign('cal_gastos_material_id_foreign');
        });
        Schema::table('cal_gastos', function (Blueprint $table) {
            $table->dropForeign('cal_gastos_presupuesto_id_foreign');
        });
        Schema::dropIfExists('cal_gastos');
    }
}
