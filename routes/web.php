<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// rota para mostrar a lista de usuarios
Route::get('/users', [UserController::class, 'index'])->name('users.index');
// rota para mostrar os dados do usuario
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
// Route::get('/', function () {
//     return view('welcome');
// });

