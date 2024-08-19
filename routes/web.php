<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MatchController;
use App\Models\Player;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;



Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/send-test-email', [MailController::class, 'sendMail']);
Route::get('/main', [MainController::class, 'index'])->name('main.index')
    ->middleware(['auth', 'verified']);


Route::resource('teams', TeamController::class);
Route::resource('players', PlayerController::class);
Route::post('players/{player}/addRole', [PlayerController::class, 'addRole'])->name('players.addRole');
Route::resource('matches', MatchController::class);
Route::get('/matches/{match}', [MatchController::class, 'show'])->name('matches.show');

Route::get('/matches/{match}/confirm/{player}/{response}', [MatchController::class, 'confirmParticipation'])->name('matches.confirm');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
