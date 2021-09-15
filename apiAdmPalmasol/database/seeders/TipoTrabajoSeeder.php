<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipoTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $tipoTrabajo = new \App\Models\TipoTrabajo();
        $tipoTrabajo->id = 1;
        $tipoTrabajo->descripcion = 'Asfalto';
        $tipoTrabajo->save();

        //2
        $tipoTrabajo = new \App\Models\TipoTrabajo();
        $tipoTrabajo->id = 2;
        $tipoTrabajo->descripcion = 'Lastre';
        $tipoTrabajo->save();

        //3
        $tipoTrabajo = new \App\Models\TipoTrabajo();
        $tipoTrabajo->id = 3;
        $tipoTrabajo->descripcion = 'Mano de Obra';
        $tipoTrabajo->save();

        //4
        $tipoTrabajo = new \App\Models\TipoTrabajo();
        $tipoTrabajo->id = 4;
        $tipoTrabajo->descripcion = 'Alquiler de Maquinaria';
        $tipoTrabajo->save();
    }
}
