<?php

use App\Http\Controllers\Dashboard\IndexController as DashboardIndexController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LeaderBoardController;

use Illuminate\Support\Facades\Auth;
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

Route::get('/main', [IndexController::class, 'index'])->name('main');
Route::post('/submit',[IndexController::class, 'submit'])->name('submit');
Route::get('/',[LeaderBoardController::class, 'index'])->name('leaderboard');

Auth::routes();
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function(){
    Route::get('/',[DashboardIndexController::class,'index'])->name('index');
});
