<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $material = new \App\Models\Material();
        $material->id = 1;
        $material->nombre = 'Cemento';
        $material->costo = 5000;
        $material->proveedor_id = 402770289;
        $material->save();

        //2
        $material = new \App\Models\Material();
        $material->id = 2;
        $material->nombre = 'Concreto';
        $material->costo = 2000;
        $material->proveedor_id = 402770289;
        $material->save();

        //3
        $material = new \App\Models\Material();
        $material->id = 3;
        $material->nombre = 'Arena';
        $material->costo = 3000;
        $material->proveedor_id = 108820654;
        $material->save();
    }
}
