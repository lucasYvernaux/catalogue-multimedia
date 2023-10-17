<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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


Route::get('/films', [FilmController::class, 'show'])->middleware(['auth', 'verified'])->name('films');
Route::post('/films', [FilmController::class, 'search'])->middleware(['auth', 'verified'])->name('search-films');


Route::get('/films/add', function () {
    return view('film.add');
})->middleware(['auth', 'verified'])->name('film.add');
Route::post('/films/add', [FilmController::class, 'addMovie'])->middleware(['auth', 'verified'])->name('film.add');

Route::get('/films/{idFilm}', [FilmController::class, 'showMovie'])->middleware(['auth', 'verified'])->name('film.info');

Route::get('/films/edit/{idFilm}', [FilmController::class, 'showEditMovie'])->middleware(['auth', 'verified'])->name('film.edit');
Route::post('/films/edit/{idFilm}', [FilmController::class, 'editMovie'])->middleware(['auth', 'verified'])->name('film.edit');

require __DIR__.'/auth.php';
