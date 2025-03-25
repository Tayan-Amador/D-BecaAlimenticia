<?php

use App\Http\Controllers\Alumnos\AlumnoController;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\Huellas\HuellaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Reportes\ReporteController;
use Illuminate\Support\Facades\Route;

/*
|-------------------------------------------------------------------------- 
| Web Routes
|-------------------------------------------------------------------------- 
| 
| Aquí puedes registrar las rutas web para tu aplicación. 
| Estas rutas son cargadas por el RouteServiceProvider y todas se asignarán 
| al grupo de middleware "web". 
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Gestión de Alumnos
Route::middleware('auth')->prefix('alumnos')->as('alumnos.')->group(function () {
    Route::get('/registrar', [AlumnoController::class, 'create'])->name('registrar');
    Route::get('/listado', [AlumnoController::class, 'index'])->name('listado');
});

// Gestión de Huellas
Route::middleware('auth')->prefix('huellas')->as('huellas.')->group(function () {
    Route::get('/registrar', [HuellaController::class, 'create'])->name('registrar');
    Route::get('/listado-sin-huella', [HuellaController::class, 'sinHuella'])->name('listado.sin_huella');
});

// Registro de Comidas
Route::middleware('auth')->prefix('comidas')->as('comidas.')->group(function () {
    Route::get('/registrar', [ComidaController::class, 'create'])->name('registrar');
});

// Reportes
Route::middleware('auth')->prefix('reportes')->as('reportes.')->group(function () {
    Route::get('/alumnos', [ReporteController::class, 'alumnos'])->name('alumnos');
    Route::get('/comidas', [ReporteController::class, 'comidas'])->name('comidas');
});

require __DIR__.'/auth.php';
