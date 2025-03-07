<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SumaController;

use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('index');
})->name('inicio');


// Route::get('/suma', function () {
//     return view('suma');
// });

Route::get('/suma', [SumaController::class, 'index']);
Route::post('/suma', [SumaController::class, 'suma'])->name('suma');
Route::resource('productos', ProductoController::class);

