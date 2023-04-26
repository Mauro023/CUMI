<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::resource('employes', App\Http\Controllers\API\employeAPIController::class);


Route::resource('calendars', App\Http\Controllers\API\calendarAPIController::class);


Route::resource('attendances', App\Http\Controllers\API\attendanceAPIController::class);

Route::post('updateEntrance', [App\Http\Controllers\API\attendanceAPIController::class, 'updateEntrance']);