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
Route::get('', [FormController::class,'index'])->name('showform');
Route::get('/formInfo/{id}', [FormController::class, 'infoForm'])->name('infoForm');
Route::get('/ContactEdit/{id}/', [FormController::class, 'edit'])->name('editForm');
Route::put('/Contact/{id}', [FormController::class, 'update'])->name('updateForm');
// Route::get('/form', [FormController::class, 'show'])->name('form');
