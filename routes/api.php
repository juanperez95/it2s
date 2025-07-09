<?php

use App\Http\Controllers\AcudienteController;
use App\Http\Controllers\NinoController;
use Illuminate\Support\Facades\Route;


// Uso del controlador para niño
Route::controller(NinoController::class)->group(function () {
    Route::get('/ninos', 'getNinos');
    Route::post('/ninos', 'createNino');
    Route::put('/ninos', 'updateNino');
    Route::delete('/ninos', 'deleteNino');
});

// Uso de controlador para los acudientes
Route::controller(AcudienteController::class)->group(function(){
    Route::get('/acudientes', 'getAcudientes');
    Route::post('/acudientes', 'createAcudiente');
    Route::put('/acudientes', 'updateAcudiente');
    Route::delete('/acudientes', 'deleteAcudiente');
});




// MUY IMPORTANTE: esta ruta responde el preflight
Route::options('/{any}', function () {
    return response('', 204);
})->where('any', '.*');
