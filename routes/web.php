<?php

use App\Http\Controllers\BoatController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index']);
Route::post('/search', [BoatController::class, 'search']);
Route::get('/boat/{boat}', [BoatController::class, 'get']);
