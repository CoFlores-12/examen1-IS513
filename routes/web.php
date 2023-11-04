<?php

use App\Http\Controllers\ContactoController;
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

//############# ROUTES DIRECTORIO #############

Route::get('/directorio', [DirectorioController::class, 'inicio'])->name('directorio.inicio');

Route::get('/directorio/crear', [DirectorioController::class, 'crear'])->name('directorio.crear');

Route::post('/directorio/guardar', [DirectorioController::class, 'guardar'])->name('directorio.guardar');

Route::get('/directorio/buscar', [DirectorioController::class, 'buscar'])->name('directorio.buscar');

Route::post('/directorio/buscarPost', [DirectorioController::class, 'buscarPost'])->name('directorio.buscarPost');

Route::get('/directorio/eliminar/{codigoEntrada}', [DirectorioController::class,'eliminar'])->name('directorio.eliminar');

Route::get('/directorio/eliminarConfirmado/{codigoEntrada}', [DirectorioController::class,'eliminarConfirmado'])->name('directorio.eliminarConfirmado');


//############# ROUTES CONTACTOS #############

Route::get('/contactos/{codigoEntrada}', [ContactoController::class, 'inicio'])->name('contacto.inicio');

Route::get('/contactos/crear/{codigoEntrada}', [ContactoController::class, 'crear'])->name('contacto.crear');

Route::post('/contactos/guardar/{codigoEntrada}', [ContactoController::class, 'guardar'])->name('contacto.guardar');

Route::get('/contacto/eliminar/{idContacto}', [ContactoController::class,'eliminar'])->name('contacto.eliminar');
