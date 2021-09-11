<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->decimal('subtotal');
            $table->decimal('iva');
            $table->decimal('total');
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('tipo_trabajo_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('tipo_trabajo_id')->references('id')->on('tipo_trabajos');
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
        Schema::table('comprobantes', function (Blueprint $table) {
            $table->dropForeign('comprobantes_cliente_id_foreign');
        });
        Schema::table('comprobantes', function (Blueprint $table) {
            $table->dropForeign('comprobantes_tipo_trabajo_id_foreign');
        });
        Schema::dropIfExists('comprobantes');
    }
}
