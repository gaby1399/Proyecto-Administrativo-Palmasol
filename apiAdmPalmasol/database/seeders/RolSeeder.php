<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $rol = new \App\Models\Rol();
        $rol->id = 1;
        $rol->descripcion = 'Administrador';
        $rol->save();
    }
}
