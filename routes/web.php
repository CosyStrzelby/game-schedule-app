<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MatchController;

use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main', [MainController::class, 'index'])->name('main.index')
    ->middleware(['auth', 'verified']);

Route::resource('teams', TeamController::class);
Route::resource('players', PlayerController::class);
Route::resource('matches', MatchController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';










