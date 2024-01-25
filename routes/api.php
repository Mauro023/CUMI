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


Route::resource('articles', App\Http\Controllers\API\articlesAPIController::class);


Route::resource('labours', App\Http\Controllers\API\labourAPIController::class);


Route::resource('procedures', App\Http\Controllers\API\proceduresAPIController::class);


Route::resource('baskets', App\Http\Controllers\API\basketAPIController::class);


Route::resource('consumables', App\Http\Controllers\API\consumableAPIController::class);


Route::resource('medical_fees', App\Http\Controllers\API\medical_feesAPIController::class);


Route::resource('diferential_rates', App\Http\Controllers\API\diferential_ratesAPIController::class);


Route::resource('doctors', App\Http\Controllers\API\doctorsAPIController::class);


Route::resource('surgeries', App\Http\Controllers\API\surgeryAPIController::class);


Route::resource('unit_costs', App\Http\Controllers\API\unit_costsAPIController::class);


Route::resource('general_costs', App\Http\Controllers\API\general_costsAPIController::class);


Route::resource('soat_groups', App\Http\Controllers\API\soat_groupAPIController::class);
