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

//Pagina principal
Route::get('/', HomeController::class)->name('index');

//Pagina principal estudiante
Route::get('/estudiante', [EstudianteController::class, 'index'])->name('inicio.estudiante');

//Creacion de cita
Route::get('/cita', [EstudianteController::class, 'create'])->name('cita.estudiante');

/* TODO:
        cambiar como se muestra la url (fue necesario para hacer la validacion - cambio get)
*/
//Recibe informacion del formulario
Route::post('/cita/guardar', [EstudianteController::class, 'store'])->name('store.estudiante');

//Actualizar cita
Route::post('/cita/actualizar/{id}', [EstudianteController::class, 'update'])->name('update.estudiante');

/* TODO:
        validaciones 2 de 4
        analizar si quitarlo
        tal vez cambiarlo por una funcion de status (cita tomada o no tomada)
        vista de escritorio
*/
//Informacion personal estudiante
Route::get('/miscitas', [EstudianteController::class, 'show'])->name('show.estudiante');
/* TODO:
vista movil - escritorio
*/

Route::post('/miscitas/act', [EstudianteController::class, 'storeInfo'])->name('store.info');

//Registros proximos

Route::get('/prox-reg', [AdmController::class, 'index'])->name('log.citas')->middleware('rol.admin');

//Todos los registros
Route::get('/registros', [AdmController::class, 'allReg'])->name('log.all');

/* TODO:
        regresar las citas de la fecha de hoy en adelante y en otra tabla menos elaborada todos los registros *checar lo de carbon php*
*/
/* CRUD */
/* Detalles */
Route::get('/registro/{id}', [AdmController::class, 'searchID'])->name('log.id');
/* Editar */
Route::get('/registro/editar/{id}', [AdmController::class, 'editID'])->name('log.edit');
/* Actualizar esta arriba */
/* Eliminar */
Route::get('/registro/eliminar/{id}', [AdmController::class, 'deleteID'])->name('log.del');
