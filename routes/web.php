<?php

use App\Http\Controllers\NinoController;
use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('principal');
})->where('any', '^(?!api).*$');



