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

/* TODO: no funciona las opciones del menu desplegable del usuario en la barra de navegacion */

//Pagina principal
Route::get('/', HomeController::class)->name('index');

//Pagina principal estudiante
Route::get('/estudiante', [EstudianteController::class, 'index'])->name('inicio.estudiante');
/* Hecho:
    Vista movil y vista de escritorio completado
    validacion de fecha vacia
    colocarlo en la barra de navegacion
*/

/* TODO:
        Pantalla principal de estudiantes
        middleware de acceso TODOS
        informacion personal *no se ha hecho*
*/

//Creacion de cita
Route::get('/cita', [EstudianteController::class, 'create'])->name('cita.estudiante');

/*
    Vista movil y Vista de escritorio completado
    validacion del formulario *datos vacios - formato de datos*
*/

/* TODO: input hide para la fecha *tal vez*
        cambiar como se muestra la url (fue necesario para hacer la validacion - cambio get)
*/
//Recibe informacion del formulario
Route::post('/cita/guardar', [EstudianteController::class, 'store'])->name('store.estudiante');

//Actualizar cita
Route::post('/cita/actualizar/{id}', [EstudianteController::class, 'update'])->name('update.estudiante');
/* Vista movil
    validaciones 2 de 4
*/

/* TODO:  analizar si quitarlo
        tal vez cambiarlo por una funcion de status (cita tomada o no tomada)
        vista de escritorio
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
/* Vista movil completado vista de escritorio
    funcion crud */

/* TODO:
        regresar las citas de la fecha de hoy en adelante y en otra tabla menos elaborada todos los registros
        pagina principal de administradores
        colocarlo en la barra de navegacion solo para adm
        middleware solo para adm

*/
/* CRUD */
/* Detalles */
Route::get('/registro/{id}', [AdmController::class, 'searchID'])->name('log.id');
/* Editar */
Route::get('/registro/editar/{id}', [AdmController::class, 'editID'])->name('log.edit');
/* Actualizar esta arriba */
/* Eliminar */
Route::get('/registro/eliminar/{id}', [AdmController::class, 'deleteID'])->name('log.del');
