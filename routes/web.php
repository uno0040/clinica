<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// rota para mostrar a lista de usuarios
// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// rota para mostrar os dados do usuario
// Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
// rota para criacao de usuarios
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::get('/users')
// Route::get('/', function () {
//     return view('welcome');
// });

