<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventMenuController;
use App\Http\Controllers\ShowController;
use App\Models\Event;

// Route::get('/', function () {
//     return view('user.dashboard');
// });

Route::get('/event/{id}', [EventController::class, 'show'])->name('event.details');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');


route::get('/details', function () {
    return view('user.EventDetails');
});

Route::get('/event', function () {
    return view('user.MenuEvent');
});

Route::get('/event', [EventMenuController::class, 'index'])->name('user.MenuEvent');
// Route::get('/', function () {
//     return view('user.dashboard');
// });

Route::get('/', [DashboardController::class, 'index'])->name('user.dashboard');


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
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('dashboard');

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
    

    // Route untuk Artis CRUD
    Route::get('admin/artists', [ArtistController::class, 'index'])->name('artists.index');
    Route::get('admin/artists/create', [ArtistController::class, 'create'])->name('artists.create');
    Route::post('admin/artists', [ArtistController::class, 'store'])->name('artists.store');
    Route::get('admin/artists/{artist}', [ArtistController::class, 'show'])->name('artists.show');
    Route::get('admin/artists/{artist}/edit', [ArtistController::class, 'edit'])->name('artists.edit');
    Route::put('admin/artists/{artist}', [ArtistController::class, 'update'])->name('artists.update');
    Route::delete('admin/artists/{artist}', [ArtistController::class, 'destroy'])->name('artists.destroy');
    // Route untuk pencarian artis
    Route::get('admin/artists/search', [ArtistController::class, 'search'])->name('artists.search');
    // Route untuk Show CRUD
    Route::get('admin/shows', [ShowController::class, 'index'])->name('shows.index');
    Route::get('admin/shows/create', [ShowController::class, 'create'])->name('shows.create');
    Route::post('admin/shows', [ShowController::class, 'store'])->name('shows.store');
    Route::get('/admin/shows/{id_event}/edit', [ShowController::class, 'edit'])->name('shows.edit');
    Route::put('/admin/shows/{id_event}', [ShowController::class, 'update'])->name('shows.update');
    Route::delete('admin/shows/{id_event}', [ShowController::class, 'destroy'])->name('shows.destroy');


});
require __DIR__.'/auth.php';
