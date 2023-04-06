<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LeaderBoardController;
use App\Http\Controllers\Dashboard\LevelController;
// use App\Http\Controllers\AnswerFromExpertController;
use App\Http\Controllers\Dashboard\AnswerFromExpert;
// use App\View\Components\Dashboard\MakeQuestions;
use App\Http\Controllers\Dashboard\ExpertController;
use App\Http\Controllers\Dashboard\SubmissionChecker;
use App\Http\Controllers\Dashboard\QuestionController;
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

Route::get('/main', [IndexController::class, 'index'])->name('main');
Route::post('/submit',[IndexController::class, 'submit'])->name('submit');
Route::get('/',[LeaderBoardController::class, 'index'])->name('leaderboard');

Auth::routes();
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function(){
    Route::resource('questions',QuestionController::class);
    Route::resource('submissions-checker',SubmissionChecker::class);
    Route::resource('levels',LevelController::class);
    Route::resource('experts',ExpertController::class);
    Route::resource('answers',AnswerFromExpert::class);
    Route::get('/',[DashboardIndexController::class,'index'])->name('index');
});
