<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/agents', [\App\Http\Controllers\API\AgentsController::class, 'index']);
Route::post('/agents/{agent}/properties', [\App\Http\Controllers\API\AgentsController::class, 'addProperty']);
Route::delete('/agents/{agent}/properties', [\App\Http\Controllers\API\AgentsController::class, 'removeProperty']);

Route::get('/properties', [\App\Http\Controllers\API\PropertiesController::class, 'search']);
