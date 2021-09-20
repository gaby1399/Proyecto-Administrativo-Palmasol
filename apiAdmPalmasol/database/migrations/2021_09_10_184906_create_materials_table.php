<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('nombre');
            $table->decimal('costo');
            $table->integer('proveedor_id');
            //$table->integer('proveedor_id')->unsigned();
            //$table->foreignId('proveedor_id')->constrained();
            //algunas que he cambiando y que igual me da error.
            $table->timestamps();
            $table->foreign('proveedor_id')->references('id')->on('proveedors'); //ERROR
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropForeign('materials_proveedor_id_foreign');
        });
        Schema::dropIfExists('materials');
    }
}
