<?php

use App\Http\Controllers\FestivalsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\UsersController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/festivals/show', function () {
    return view('festivals.show');
})->middleware(['auth', 'verified'])->name('festivals.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::resource('users', UsersController::class)

    ->middleware(['auth', 'verified']);

route::resource('festivals', festivalsController::class)

    ->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/festivals', [festivalsController::class, 'index'])->name('festivals.index');
    Route::get('/festivals/create', [festivalsController::class, 'create'])->name('festivals.create');
    Route::post('/festivals/store', [festivalsController::class, 'store'])->name('festivals.store');
    Route::get('/{festival}/edit', [festivalsController::class, 'edit'])->name('festivals.edit');
    Route::put('/{festival}/update', [festivalsController::class, 'update'])->name('festivals.update');
    Route::delete('/festivals/{id}', [festivalsController::class, 'destroy'])->name('festivals.destroy');
    Route::get('/festivals/show', [festivalsController::class, 'show'])->name('festivals.show');
    Route::get('/{festival}/show', [festivalsController::class, 'show'])->name('festivals.show');
    Route::get('/festivals/show/{id}', [festivalsController::class, 'show'])->name('festivals.show');
});


require __DIR__.'/auth.php';
