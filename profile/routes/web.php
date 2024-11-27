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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/{post}/update', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';
