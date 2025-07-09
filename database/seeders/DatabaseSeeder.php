<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Crear pruebas de datos con seeders
        $this->call(AcudienteSeed::class);

        // Despues crear al ninño
        $this->call(NinosSeed::class);
    }
}
