<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CauseController;
use App\Http\Controllers\SubmissionController;

Route::get('/', function () {
    return redirect()->route('home');
});

// Auth Routes (Login, Register, Reset Password)
Auth::routes();

// HOME & PROFILE
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

// EXPLORE CAUSES
Route::get('/causes', [CauseController::class, 'index'])->name('causes');
Route::get('/causes/{charity:slug}', [CauseController::class, 'show'])->name('causes.show');

// SUBMIT CHARITY
Route::get('/submit-charity', [SubmissionController::class, 'create'])->name('submissions.create');
Route::post('/submit-charity', [SubmissionController::class, 'store'])->name('submissions.store');
