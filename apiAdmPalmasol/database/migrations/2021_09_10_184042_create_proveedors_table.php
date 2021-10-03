<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();
=======
<<<<<<< HEAD
            $table->integer('id')->unique();
=======
            $table->id();
>>>>>>> Gaby
>>>>>>> 99bc27884dafdadc4614307fbc5026dd22ed0e1a
            $table->boolean('estado');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('direccion');
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
        Schema::dropIfExists('proveedors');
    }
}
