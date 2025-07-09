<?php

namespace Database\Seeders;

use App\Models\Nino;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NinosSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos de prueba en mysql
        $child = Nino::create([
            'nombre' => 'Juan Perez',
            'salon' => 'A1',
            'edad' => 5,
            'genero' => 'Masculino',
            'acudiente_id' => 1, // Asegúrate de que el acudiente con ID 1 exista
        ])->save();
    }
}
