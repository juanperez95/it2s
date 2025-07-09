<?php

use App\Http\Controllers\NinoController;
use Illuminate\Support\Facades\Route;


// Uso del controlador para niño
Route::controller(NinoController::class)->group(function () {
    Route::get('/ninos', 'getNinos');
    Route::post('/ninos', 'registrarNino');
    Route::put('/ninos', 'updateNino');
    Route::delete('/ninos', 'deleteNino');
});


// MUY IMPORTANTE: esta ruta responde el preflight
Route::options('/{any}', function () {
    return response('', 204);
})->where('any', '.*');
