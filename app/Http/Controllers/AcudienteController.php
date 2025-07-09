<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcudienteController extends Controller
{
    //
    protected $fillable = [
        'id',
        'nombre',
        'genero'
    ];

    // Datos ocultos al llamar el modelo
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
