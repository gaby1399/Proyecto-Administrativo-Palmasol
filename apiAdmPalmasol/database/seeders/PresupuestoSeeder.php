<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PresupuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        //Crear tabla pivot entre materiales y presupuesto?
        $presupuesto = new \App\Models\Presupuesto();
        $presupuesto->material_id = 1;
        $presupuesto->cliente_id = 408345654;
        $presupuesto->subtotal = 5000;
        $presupuesto->iva = 650;
        $presupuesto->total = 5650;
        $presupuesto->save();

        //2
        //Crear tabla pivot entre materiales y presupuesto?
        $presupuesto = new \App\Models\Presupuesto();
        $presupuesto->material_id = 2;
        $presupuesto->cliente_id = 102776582;
        $presupuesto->subtotal = 12000;
        $presupuesto->iva = 1560;
        $presupuesto->total = 13560;
        $presupuesto->save();
    }
}
