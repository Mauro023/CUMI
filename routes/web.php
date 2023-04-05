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

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
	Route::resource('users', App\Http\Controllers\Admin\UsersController::class, ['as' => 'admin']);

    Route::resource('roles', App\Http\Controllers\Admin\RolesController::class, ['except' => 'show', 'as' => 'admin']);
    Route::resource('permissions', App\Http\Controllers\Admin\PermissionsController::class, ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);

    Route::middleware('role:Admin')
    	->put('users/{user}/roles', 'UsersRolesController@update')
    	->name('admin.users.roles.update');

    Route::middleware('role:Admin')
        ->put('users/{user}/permissions', 'UsersPermissionsController@update')
        ->name('admin.users.permissions.update');

});

Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('employes', App\Http\Controllers\employeController::class);


Route::resource('calendars', App\Http\Controllers\calendarController::class);


Route::resource('attendances', App\Http\Controllers\attendanceController::class);
Route::resource('control', App\Http\Controllers\controlController::class);

Route::post('/filterUser', [App\Http\Controllers\Admin\UsersController::class, 'filter'])->name('users.filter');
Route::post('/filterEmploye', [App\Http\Controllers\EmployeController::class, 'filter'])->name('employes.filter');
Route::post('/filterAttendance', [App\Http\Controllers\AttendanceController::class, 'filter'])->name('attendances.filter');
Route::post('/filterCalendar', [App\Http\Controllers\CalendarController::class, 'filter'])->name('calendars.filter');
