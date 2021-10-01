<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $proveedor = new \App\Models\Proveedor();
        $proveedor->id = 402770289;
        $proveedor->nombre = 'María Jimenez';
        $proveedor->telefono = '60682554';
        $proveedor->direccion = 'Alajuela';
        $proveedor->estado = true;
        $proveedor->save();

        //2
        $proveedor = new \App\Models\Proveedor();
        $proveedor->id = 201480277;
        $proveedor->nombre = 'Marco Segura';
        $proveedor->telefono = '84157236';
        $proveedor->direccion = 'Heredia';
        $proveedor->estado = true;
        $proveedor->save();

        //3
        $proveedor = new \App\Models\Proveedor();
        $proveedor->id = 108820654;
        $proveedor->nombre = 'Carlos Hernandez';
        $proveedor->telefono = '87256695';
        $proveedor->direccion = 'San Jóse';
        $proveedor->estado = true;
        $proveedor->save();

        //4
        $proveedor = new \App\Models\Proveedor();
        $proveedor->id = 404180598;
        $proveedor->nombre = 'Elsa Murillo';
        $proveedor->telefono = '84159923';
        $proveedor->direccion = 'Alajuela';
        $proveedor->estado = false;
        $proveedor->save();
    }
}
