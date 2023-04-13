<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeaderBoardController;
// use App\Http\Controllers\AnswerFromExpertController;
use App\Http\Controllers\Auth\SocialiteController;
// use App\View\Components\Dashboard\MakeQuestions;
use App\Http\Controllers\Dashboard\LevelController;
use App\Http\Controllers\Dashboard\AnswerFromExpert;
use App\Http\Controllers\Dashboard\ExpertController;
use App\Http\Controllers\Dashboard\SubmissionChecker;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Auth\CompleteRegistrationController;
use App\Http\Controllers\Dashboard\IndexController as DashboardIndexController;

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
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

Route::get('leader-board',[LeaderboardController::class, 'index'])->name('leader-board');
Route::get('about-us',[AboutUsController::class, 'index'])->name('about-us');
Route::get('contact',[ContactController::class, 'index'])->name('contact');
Route::get('/',[IndexController::class, 'index'])->name('index');

Route::middleware(['auth'])->prefix('profile')->name('profile.')->group(function(){
    Route::get('/',[ProfileController::class, 'index'])->name('index');
    Route::get('/progress',[ProfileController::class, 'progress'])->name('progress');
    Route::get('/edit',[ProfileController::class, 'edit'])->name('edit');
    Route::post('/store',[ProfileController::class, 'store'])->name('store');
    Route::resource('complete-registration',CompleteRegistrationController::class);
});

Route::middleware(['auth','can:answer-the-question'])->post('/submit',[GameController::class, 'store'])->name('submit');
Route::middleware(['auth','can:answer-the-question'])->get('/main', [GameController::class, 'index'])->name('main');


Auth::routes();
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function(){
    Route::resource('questions',QuestionController::class);
    Route::resource('submissions-check',SubmissionChecker::class);
    Route::post('submissions-check/accept',[SubmissionChecker::class,'accept'])->name('submissions-check.accept');
    Route::post('submissions-check/reject',[SubmissionChecker::class,'reject'])->name('submissions-check.reject');
    Route::resource('levels',LevelController::class);
    Route::resource('experts',ExpertController::class);
    Route::resource('answers',AnswerFromExpert::class);
    Route::get('/',[DashboardIndexController::class,'index'])->name('index');
});
