<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes for seasons
Route::get('/season/create', [App\Http\Controllers\SeasonController::class, 'create']);
Route::post('/season', [App\Http\Controllers\SeasonController::class, 'store']);
Route::get('/season/{year}', [App\Http\Controllers\SeasonController::class, 'show']);

// Routes for matches
Route::get('/match/create/{season}', [App\Http\Controllers\MatchController::class, 'create']);
Route::post('/match', [App\Http\Controllers\MatchController::class, 'store']);


// Routes for teams
Route::get('/team/create', [App\Http\Controllers\TeamController::class, 'create']);
Route::post('/team', [App\Http\Controllers\TeamController::class, 'store']);


Auth::routes();


