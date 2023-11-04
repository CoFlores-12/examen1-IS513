<?php

use App\Http\Controllers\DirectorioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/directorio', [DirectorioController::class, 'inicio'])->name('directorio.inicio');

Route::get('/directorio/crear', [DirectorioController::class, 'crear'])->name('directorio.crear');

Route::post('/directorio/guardar', [DirectorioController::class, 'guardar'])->name('directorio.guardar');

Route::get('/directorio/buscar', [DirectorioController::class, 'buscar'])->name('directorio.buscar');
Route::post('/directorio/buscarPost', [DirectorioController::class, 'buscarPost'])->name('directorio.buscarPost');