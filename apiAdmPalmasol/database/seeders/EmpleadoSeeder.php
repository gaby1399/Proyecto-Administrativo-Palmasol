<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $empleado = new \App\Models\Empleado();
        $empleado->id = 202770289;
        $empleado->nombre = 'Isaac Jimenez';
        $empleado->telefono = '89457266';
        $empleado->direccion = 'Alajuela';
        $empleado->save();

        //2
        $empleado = new \App\Models\Empleado();
        $empleado->id = 101480277;
        $empleado->nombre = 'Rocio Segura';
        $empleado->telefono = '62581473';
        $empleado->direccion = 'Heredia';
        $empleado->save();

        //3
        $empleado = new \App\Models\Empleado();
        $empleado->id = 408820654;
        $empleado->nombre = 'Alicia Hernandez';
        $empleado->telefono = '66851299';
        $empleado->direccion = 'San Jóse';
        $empleado->save();

        //4
        $empleado = new \App\Models\Empleado();
        $empleado->id = 204180598;
        $empleado->nombre = 'Pedro Murillo';
        $empleado->telefono = '84875623';
        $empleado->direccion = 'San Jóse';
        $empleado->save();
    }
}
