<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
});
Route::get('/form', function () {
    return view('form');
});

Route::post('/form', [FormController::class, 'add'])->name('addform');
// Route::get('/form', [FormController::class, 'show'])->name('form');
