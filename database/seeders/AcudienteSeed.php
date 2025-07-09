<?php

namespace Database\Seeders;

use App\Models\Acudiente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcudienteSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear acudiente de prueba
        $acudiente = Acudiente::create([
            'nombre' => 'Paola Gomez',
            'genero' => 'Femenino', // Solo definir Femenino y Masculino
        ])->save();
    }
}
