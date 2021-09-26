<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $usuario = new \App\Models\Usuario();
        $usuario->id = 1;
        $usuario->email="empresapalmasol@admin.com";
        $usuario->password = 'adm123';
        $usuario->rol_id = 1;
        $usuario->save();
    }
}
