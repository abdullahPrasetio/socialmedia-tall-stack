<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Status\Edit as StatusEdit;
use App\Http\Livewire\Status\Delete as StatusDelete;
use App\Http\Livewire\Status\Show as StatusShow;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Controllers\TimelineController;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Account\Edit as AccountEdit;
use App\Http\Livewire\Account\Show as AccountShow;
use App\Http\Controllers\Auth\EmailVerificationController;

Route::get('/', function () {
    return redirect()->route('timeline');
})->name('home');

// Livewire
Route::get('user/{identifier}', AccountShow::class)->name('account.show');
Route::get('status/{hash}', StatusShow::class)->name('status.show');
Route::middleware('auth')->group(function () {
    Route::get('settings', AccountEdit::class)->name('settings');
    Route::get('status/{hash}/edit', StatusEdit::class)->name('status.edit');
    Route::get('status/{hash}/delete', StatusDelete::class)->name('status.delete');
    Route::get('timeline', TimelineController::class)->name('timeline');
});

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
