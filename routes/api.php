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

Route::resource('contracts', App\Http\Controllers\API\contractsAPIController::class);


Route::resource('endowments', App\Http\Controllers\API\endowmentAPIController::class);


Route::resource('cards', App\Http\Controllers\API\cardAPIController::class);


Route::resource('medicines', App\Http\Controllers\API\MedicineAPIController::class);



Route::resource('invima_registrations', App\Http\Controllers\API\invima_registrationAPIController::class);


Route::resource('medication_templates', App\Http\Controllers\API\medicationTemplateAPIController::class);
