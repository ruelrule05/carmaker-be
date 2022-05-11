<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CarTypeController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthenticationController::class, 'login']);
Route::post('logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');

Route::resource('cars', CarController::class)->except(['create', 'edit']);
Route::resource('colors', ColorController::class)->except(['create', 'edit']);
Route::resource('car-types', CarTypeController::class)->except(['create', 'edit']);
Route::resource('manufacturers', ManufacturerController::class)->except(['create', 'edit']);