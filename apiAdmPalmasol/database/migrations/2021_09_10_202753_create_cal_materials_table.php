<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cal_materials', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->integer('toneladas');
            $table->integer('area');
            $table->integer('calculo');
            $table->unsignedInteger('material_id');
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
        Schema::table('cal_materials', function (Blueprint $table) {
            $table->dropForeign('cal_materials_material_id_foreign');
        });
        Schema::table('cal_materials', function (Blueprint $table) {
            $table->dropForeign('cal_materials_presupuesto_id_foreign');
        });
        Schema::dropIfExists('cal_materials');
    }
}
