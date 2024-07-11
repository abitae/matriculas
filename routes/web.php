<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/alumno', [AlumnoController::class, 'index'])->name('alumno.index');
    Route::get('/alumno/{alumno}', [AlumnoController::class, 'edit'])->name('alumno.edit');
    Route::delete('/alumno', [AlumnoController::class, 'destroy'])->name('alumno.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
