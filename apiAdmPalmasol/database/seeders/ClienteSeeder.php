<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $cliente = new \App\Models\cliente();
        $cliente->id = 102776582;
        $cliente->nombre = 'Clara Monge';
        $cliente->telefono = '86491278';
        $cliente->direccion = 'Cartago';
        $cliente->estado = true;
        $cliente->save();

        //2
        $cliente = new \App\Models\cliente();
        $cliente->id = 201125577;
        $cliente->nombre = 'Karla Solano';
        $cliente->telefono = '84157236';
        $cliente->direccion = 'Heredia';
        $cliente->estado = false;
        $cliente->save();

        //3
        $cliente = new \App\Models\cliente();
        $cliente->id = 408345654;
        $cliente->nombre = 'Jose Mena';
        $cliente->telefono = '84157236';
        $cliente->direccion = 'San Jóse';
        $cliente->estado = true;
        $cliente->save();
    }
}
