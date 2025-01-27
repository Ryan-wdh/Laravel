<?php

use App\Http\Controllers\FestivalsController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Named route for dashboard
Route::middleware(['auth'])->get('/dashboard', function () {
    $user = Auth::user();
    return view('dashboard', compact('user'));
})->name('dashboard'); //route een naam geven

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::resource('users', UsersController::class)
    ->middleware(['auth', 'verified']);

Route::get('/users', function () {
    return view('users.index');
})->middleware('can:is_admin')->name('users.index');

Route::get('/users', [UsersController::class, 'index'])
    ->name('users.index');

route::resource('festivals', festivalsController::class)
    ->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/festivals', [festivalsController::class, 'index'])->name('festivals.index');
    Route::post('/festivals/store', [festivalsController::class, 'store'])->name('festivals.store');
    Route::get('/{festival}/edit', [festivalsController::class, 'edit'])->name('festivals.edit');
    Route::put('/{festival}/update', [festivalsController::class, 'update'])->name('festivals.update');
    Route::delete('/festivals/{id}', [festivalsController::class, 'destroy'])->name('festivals.destroy');
    Route::get('/festivals/show', [festivalsController::class, 'show'])->name('festivals.show');
    Route::get('/{festival}/show', [festivalsController::class, 'show'])->name('festivals.show');
    Route::get('/festivals/show/{id}', [festivalsController::class, 'show'])->name('festivals.show');
    Route::get('/festivals/{id}', [festivalsController::class, 'show'])->name('festivals.show');

    Route::get('/festivals/create', function () {
        return view('festivals.create');
    })->middleware('can:is_admin')->name('festivals.create'); //alleen admins hebben toegang aan festivals create
});

Route::delete('/buses/{bus}', [BusController::class, 'remove'])->name('buses.destroy');

Route::post('/book/{busId}', [BusController::class, 'book'])
    ->middleware('auth') //kan alleen als je bent ingelogd
    ->name('book.bus');

route::resource('points', PointsController::class)
    ->middleware(['auth', 'verified']);

Route::post('/buy', [PointsController::class, 'buy'])
    ->middleware('auth')
    ->name('buy.points');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/points', [PointsController::class, 'index'])->name('points.index');
});

require __DIR__.'/auth.php';
