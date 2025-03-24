<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\HuellaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReporteController;
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
Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos/crear', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');

// **Rutas para gestión de huellas**
Route::get('/huellas/crear', [HuellaController::class, 'create'])->name('huellas.create');
Route::post('/huellas', [HuellaController::class, 'store'])->name('huellas.store'); 
Route::get('/huellas/sin-huella', [HuellaController::class, 'sinHuella'])->name('huellas.sin_huella');

// **Rutas para registro de comidas**
Route::get('/comidas/registrar', [ComidaController::class, 'create'])->name('comidas.create');
Route::post('/comidas', [ComidaController::class, 'store'])->name('comidas.store');

// **Rutas para reportes**
Route::get('/reportes/alumnos', [ReporteController::class, 'alumnos'])->name('reportes.alumnos');
Route::get('/reportes/comidas', [ReporteController::class, 'comidas'])->name('reportes.comidas');

require __DIR__.'/auth.php';
