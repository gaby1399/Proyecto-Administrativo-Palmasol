<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CalMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $calMaterial = new \App\Models\CalMaterial();
        $calMaterial->material_id = 1;
        $calMaterial->tonelada = 3;
        $calMaterial->area = 500;
        $calMaterial->calculo = 7000;
        $calMaterial->presupuesto_id = 1;
        $calMaterial->save();

        //2
        $calMaterial = new \App\Models\CalMaterial();
        $calMaterial->material_id = 2;
        $calMaterial->tonelada = 5;
        $calMaterial->area = 700;
        $calMaterial->calculo = 13000;
        $calMaterial->presupuesto_id = 2;
        $calMaterial->save();
    }
}
