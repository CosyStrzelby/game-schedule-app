<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MatchController;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/main', [MainController::class, 'index'])->name('main.index')
    ->middleware(['auth', 'verified']);
Route::get('/send-test-email', function (){
    $details = [
        'title' => 'Test Mail from Laravel',
        'body' => 'This is a test mail sent from Laravel.'
    ];

    Mail::to('robusiek27@gmail.com')
        ->send(new NotificationMail($details));
    return 'Email sent';
});

Route::resource('teams', TeamController::class);
Route::resource('players', PlayerController::class);
Route::post('players/{player}/addRole', [PlayerController::class, 'addRole'])->name('players.addRole');
Route::resource('matches', MatchController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';










