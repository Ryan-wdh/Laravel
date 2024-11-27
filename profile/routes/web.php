<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TtgController;
use App\Http\Controllers\UsersController;
use App\Models\users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::resource('ttg', TTGController::class)

    ->middleware(['auth', 'verified']);

route::resource('users', UsersController::class)

    ->middleware(['auth', 'verified']);

route::resource('posts', PostsController::class)

    ->middleware(['auth', 'verified']);


Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');

require __DIR__.'/auth.php';
