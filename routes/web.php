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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/agents', [\App\Http\Controllers\AgentsController::class, 'index'])->name('agents');
Route::get('/agents/create', [\App\Http\Controllers\AgentsController::class, 'create'])->name('agents.create');
Route::post('/agents/create', [\App\Http\Controllers\AgentsController::class, 'store']);
Route::get('/agents/{agent}/manage', [\App\Http\Controllers\AgentsController::class, 'manage'])->name('agents.manage');
