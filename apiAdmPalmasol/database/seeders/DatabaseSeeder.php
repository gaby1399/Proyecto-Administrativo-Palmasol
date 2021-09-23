<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(TipoTrabajoSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(MaterialSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(PresupuestoSeeder::class);
        $this->call(CalMaterialSeeder::class);
        $this->call(CalGastoSeeder::class);
        $this->call(ComprobanteSeeder::class);
    }
}
