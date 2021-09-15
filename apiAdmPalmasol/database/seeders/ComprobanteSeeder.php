<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ComprobanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $comprobante = new \App\Models\Comprobante();
        $comprobante->cliente_id = 102776582;
        $comprobante->tipoTrabajo_id = 1;
        $comprobante->subtotal = 7000;
        $comprobante->iva = 700;
        $comprobante->total = 7700;
        $comprobante->save();

        //1
        $comprobante = new \App\Models\Comprobante();
        $comprobante->cliente_id = 408345654;
        $comprobante->tipoTrabajo_id = 2;
        $comprobante->subtotal = 10000;
        $comprobante->iva = 1000;
        $comprobante->total = 11000;
        $comprobante->save();
    }
}
