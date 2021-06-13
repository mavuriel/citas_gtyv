<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdmController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Pagina principal
Route::get('/', HomeController::class);

//Pagina principal estudiante
Route::get('/estudiante', [EstudianteController::class, 'index'])->name('inicio.estudiante');
//Creacion de cita
Route::post('/cita', [EstudianteController::class, 'create'])->name('cita.estudiante');
//Recibe informacion del formulario
Route::post('/cita/guardar', [EstudianteController::class, 'store'])->name('store.estudiante');
//Citas estudiante
Route::get('/miscitas/{cita}', [EstudianteController::class, 'show'])->name('show.estudiante');
//Mostrar informacion personal
Route::get('/informacion', [EstudianteController::class, 'info'])->name('info.estudiante');

//Todos los registros
Route::get('/registros', [AdmController::class, 'index'])->name('log.citas');

Route::get('/registro/{id}', [AdmController::class, 'searchID'])->name('log.id');

Route::get('/registro/editar/{id}', [AdmController::class, 'editID'])->name('log.edit');
