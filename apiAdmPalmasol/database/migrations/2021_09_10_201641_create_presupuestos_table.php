<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->decimal('subtotal');
            $table->decimal('iva');
            $table->decimal('total');
            $table->unsignedInteger('material_id');
            $table->unsignedInteger('cliente_id');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
        Schema::table('presupuestos', function (Blueprint $table) {
            $table->dropForeign('presupuestos_material_id_foreign');
        });
        Schema::table('presupuestos', function (Blueprint $table) {
            $table->dropForeign('presupuestos_cliente_id_foreign');
        });
        Schema::dropIfExists('presupuestos');
    }
}
