<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpellTracker;
use App\Http\Controllers\CharacterController;
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

Route::get('/', [SpellTracker::class, 'show'])->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/createPlayer', [CharacterController::class, 'show'])->middleware('auth');
Route::post('/createNewPlayer', [CharacterController::class, 'createNewPlayer'])->middleware('auth');
Auth::routes();