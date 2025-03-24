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

// **Rutas para gestión de alumnos**
Route::get('dashboard/alumnos/registrar', [AlumnoController::class, 'create'])->name('registrar.alumno');
Route::get('dashboard/alumnos/listado', [AlumnoController::class, 'index'])->name('listado.alumnos');

// **Rutas para gestión de huellas**
Route::get('dashboard/huellas/registrar', [HuellaController::class, 'create'])->name('registrar.huella');
Route::get('dashboard/huellas/listado-sin-huella', [HuellaController::class, 'sinHuella'])->name('listado.sin_huella');

// **Rutas para registro de comidas**
Route::get('dashboard/comidas/registrar', [ComidaController::class, 'create'])->name('registrar.comida');

// **Rutas para reportes**
Route::get('dashboard/reportes/alumnos', [ReporteController::class, 'alumnos'])->name('reportes.alumnos');
Route::get('dashboard/reportes/comidas', [ReporteController::class, 'comidas'])->name('reportes.comidas');

require __DIR__.'/auth.php';
