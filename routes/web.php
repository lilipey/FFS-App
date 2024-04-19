<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ExperiencesController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/experiences', [ExperiencesController::class,'index'])->name('experiences.index');
Route::get('/experiences/create', [ExperiencesController::class,'create'])->name('experiences.create');
Route::post('/experiences', [ExperiencesController::class,'store'])->name('experiences.store');
Route::get('/experiences/{experience}', [ExperiencesController::class,'show'])->name('experiences.show');

// Route::resource('experiences', ExperiencesController::class);

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [ExperiencesController::class, 'index'])->name('dashboard');
    Route::get('dashboard/experiences/{experience}/edit', [ExperiencesController::class,'edit'])->name('experiences.edit');
    Route::put('dashboard/experiences/{experience}', [ExperiencesController::class,'update'])->name('experiences.update');
    Route::delete('dashboard/experiences/{experience}', [ExperiencesController::class,'destroy'])->name('experiences.destroy');
    
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', function () {
    return view('welcome');
}) ;

// Route::get('/', function () {
//     return view('home');
// });

/* Route::get('/experiences.store', function () {
    return view('experiences.store');
})->name('experience');

Route::post('/experiences.store', [ExperienceController::class, 'store'])->name('addexperience');
Route::get('/experiences.store', [ExperienceController::class, 'indexActivity'])->name('ActivityExperience');
Route::get('', [experienceController::class,'index'])->name('showexperience');
Route::get('/experienceInfo/{id}', [experienceController::class, 'infoExperience'])->name('infoexperience');
Route::get('/experienceEdit/{id}', [experienceController::class, 'infoEditexperience'])->name('modifyexperience');
// Route::get('/ContactEdit/{id}/', [experienceController::class, 'edit'])->name('editexperience');
Route::put('/experienceEdit/{id}', [experienceController::class, 'update'])->name('updateExperience');
// Route::get('/experience', [experienceController::class, 'show'])->name('experience');
Route::get('experienceEdit/{id}', [experienceController::class, 'edit']);
Route::delete('deleteContact/{id}', [experienceController::class, 'destroy'])->name('deleteExperience'); */
require __DIR__.'/auth.php';
