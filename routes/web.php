<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\FileController;


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

/*
 *  Rutas para el login
*/
// Ruta para regresar la vista del login de usuarios
Route::get('/',[LoginController::class,'index'])->name('login');
// Ruta para enviar datos al servidor y verificar si el usuario existe
Route::post('/',[LoginController::class,'store']);

/*
 *   Rutas para el logout
*/
//Ruta para cerrar sesión del usuario actual y regresar a la vista del login
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

/*
 *   Rutas para el registro
*/
// Ruta para regresar la vista del registro de usuarios
Route::get('/register', [RegisterController::class, 'index'])->name("register");
// Ruta para enviar datos al servidor
Route::post('/register', [RegisterController::class, 'store']);

/*
 *   Rutas para el dashboard
*/
// Ruta para regresar la vista del dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
 *   Rutas para los clientes
*/
// Ruta para regresar la vista de clientes
Route::get('/clients', [ClientController::class, 'index'])->name('clients');
// Ruta para enviar datos al servidor y crear un nuevo cliente
Route::post('/clients', [ClientController::class, 'store']);
// Ruta para regresaer la vista con el formulario de creación de clientes
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
// Ruta para eliminar un cliente
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
// Ruta para regresar la vista de edición de clientes
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
// Ruta para enviar datos al servidor y actualizar un cliente
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');

/*
 *   Rutas para los colaboradores
*/
// Ruta para regresar la vista de colaboradores
Route::get('/collaborators', [CollaboratorController::class, 'index'])->name('collaborators');
// Ruta para enviar datos al servidor y crear un nuevo colaborador
Route::post('/collaborators', [CollaboratorController::class, 'store']);
// Ruta para regresaer la vista con el formulario de creación de colaboradores
Route::get('/collaborators/create', [CollaboratorController::class, 'create'])->name('collaborators.create');
// Ruta para eliminar un colaborador
Route::delete('/collaborators/{collaborator}', [CollaboratorController::class, 'destroy'])->name('collaborators.destroy');
// Ruta para regresar la vista de edición de colaboradores
Route::get('/collaborators/{collaborator}/edit', [CollaboratorController::class, 'edit'])->name('collaborators.edit');
// Ruta para enviar datos al servidor y actualizar un colaborador
Route::put('/collaborators/{collaborator}', [CollaboratorController::class, 'update'])->name('collaborators.update');

/*
 *   Rutas para los proyectos
*/
// Ruta para regresar la vista de proyectos
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
// Ruta para enviar datos al servidor y crear un nuevo proyecto
Route::post('/projects', [ProjectController::class, 'store']);
// Ruta para regresaer la vista con el formulario de creación de proyectos
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
// Ruta para eliminar un proyecto
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
// Ruta para regresar la vista de edición de proyectos
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
// Ruta para enviar datos al servidor y actualizar un proyecto
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
// Ruta para regresar la vista de un proyecto
Route::get('/projects/{project}/show', [ProjectController::class, 'show'])->name('projects.show');


/*
 *   Rutas para los archivos
*/
// Ruta para enviar datos al servidor y crear un nuevo proyecto
Route::post('/files', [FileController::class, 'store'])->name('files.store');
// Ruta para eliminar un archivo
Route::post('/files/destroy', [FileController::class, 'destroy'])->name('files.destroy');

