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
/* Vista movil y escritorio completado */
/* TODO: titulo pantalla principal
        redirigirlos con el logo del tec*/

//Pagina principal estudiante
Route::get('/estudiante', [EstudianteController::class, 'index'])->name('inicio.estudiante');
/* Vista movil completado */

/* TODO: vista de escritorio
        Pantalla principal de estudiantes
        colocarlo en la barra de navegacion
        middleware de acceso TODOS
        informacion personal *no se ha hecho*
        validacion de fecha vacia
        */

//Creacion de cita
Route::post('/cita', [EstudianteController::class, 'create'])->name('cita.estudiante');

/*  Vista movil completado */

/* TODO: Vista de escritorio
        validacion del formulario *datos vacios - formato de datos*
*/
//Recibe informacion del formulario
Route::post('/cita/guardar', [EstudianteController::class, 'store'])->name('store.estudiante');
//Actualizar cita
Route::post('/cita/actualizar/{id}', [EstudianteController::class, 'update'])->name('update.estudiante');
/* Vista movil */

/* TODO:  analizar si quitarlo
        vista de escritorio
        validaciones
*/
//Citas estudiante
Route::get('/miscitas/{cita}', [EstudianteController::class, 'show'])->name('show.estudiante');
/* TODO: vista movil - escritorio
        colocarlo en la barra de navegacion
        no permitir que en la url al poner otro numero pueda accesar a otros datos
        informacion personal *unido de estudiante*
        tabla con sus citas
*/

//Todos los registros
Route::get('/registros', [AdmController::class, 'index'])->name('log.citas');
/* Vista movil completado
    funcion crud */

/* TODO: vista de escritorio
        pagina principal de administradores
        colocarlo en la barra de navegacion solo para adm
        middleware solo para adm

*/
Route::get('/registro/{id}', [AdmController::class, 'searchID'])->name('log.id');

Route::get('/registro/editar/{id}', [AdmController::class, 'editID'])->name('log.edit');

Route::get('/registro/eliminar/{id}', [AdmController::class, 'deleteID'])->name('log.del');
