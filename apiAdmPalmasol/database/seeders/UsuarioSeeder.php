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
        $usuario = \App\Models\Usuario::create([
            'id' => 1,
            'email'=> 'empresapalmasol@admin.com',
            'password' => bcrypt('adm123'),
            'rol_id' => 1
        ]);
        $usuario->save();
    }
}
