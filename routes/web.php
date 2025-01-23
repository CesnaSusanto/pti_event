<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('user.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    // Route untuk Event CRUD
    Route::get('admin/events', [EventController::class, 'index'])->name('events.index');
    Route::get('admin/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('admin/events', [EventController::class, 'store'])->name('events.store');
    Route::get('admin/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('admin/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('admin/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('admin/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    // Route untuk pencarian event
    Route::get('admin/events/search', [EventController::class, 'search'])->name('events.search');
});


require __DIR__.'/auth.php';
