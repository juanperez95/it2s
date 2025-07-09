<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('principal');
})->where('any', '.*'); // Manipular solo las rutas de vue y no laravel
