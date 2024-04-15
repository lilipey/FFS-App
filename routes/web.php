<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('home');
});
Route::get('/experience', function () {
    return view('experience');
});

Route::post('/experience', [experienceController::class, 'add'])->name('addexperience');
Route::get('', [experienceController::class,'index'])->name('showexperience');
Route::get('/experienceInfo/{id}', [experienceController::class, 'infoExperience'])->name('infoexperience');
Route::get('/experienceEdit/{id}', [experienceController::class, 'infoEditexperience'])->name('modifyexperience');
// Route::get('/ContactEdit/{id}/', [experienceController::class, 'edit'])->name('editexperience');
Route::put('/experienceEdit/{id}', [experienceController::class, 'update'])->name('updateExperience');
// Route::get('/experience', [experienceController::class, 'show'])->name('experience');


require __DIR__.'/auth.php';
