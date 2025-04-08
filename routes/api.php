<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

// Rutas para CRUD empresas
Route::get('/empresas', [EmpresaController::class, 'index']);
Route::post('/empresas', [EmpresaController::class, 'store']);
Route::get('/empresas/{id}', [EmpresaController::class, 'show']);
Route::put('/empresas/{id}', [EmpresaController::class, 'update']);
Route::delete('/empresas/{id}', [EmpresaController::class, 'destroy']);

// Rutas para CRUD alumnos
Route::get('/alumnos', [AlumnoController::class, 'index']);
Route::post('/alumnos', [AlumnoController::class, 'store']);
Route::get('/alumnos/{id}', [AlumnoController::class, 'show']);
Route::put('/alumnos/{id}', [AlumnoController::class, 'update']);
Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']);

// Rutas para CRUD asignaciones
Route::get('/asignaciones', [AsignacionController::class, 'index']);
Route::post('/asignaciones', [AsignacionController::class, 'store']);
Route::put('/asignaciones/{id}', [AsignacionController::class, 'update']);
Route::get('/asignaciones/{id}', [AsignacionController::class, 'show']);
Route::delete('/asignaciones/{id}', [AsignacionController::class, 'destroy']);    

// Ruta para registarse, login y logout
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

// Ruta para modificar o eliminar un usuario
Route::get('/usuarios', [UserController::class, 'index']);
Route::put('/usuarios/{id}', [UserController::class, 'update']);
Route::delete('/usuarios/{id}', [UserController::class, 'destroy']);

// Ruta para recuperar contraseña
Route::post('/password/email', [LoginController::class, 'sendResetLinkEmail']);