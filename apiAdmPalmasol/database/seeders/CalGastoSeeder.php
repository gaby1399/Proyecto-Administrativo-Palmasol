<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CalGastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $calGasto = new \App\Models\CalGasto();
        $calGasto->material_id = 1;
        $calGasto->total = 7000;
        $calGasto->presupuesto_id = 1;
        $calGasto->save();

        //2
        $calGasto = new \App\Models\CalGasto();
        $calGasto->material_id = 2;
        $calGasto->total = 10000;
        $calGasto->presupuesto_id = 2;
        $calGasto->save();
    }
}
