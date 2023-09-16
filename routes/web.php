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
    	->put('users/{user}/roles', 'App\Http\Controllers\Admin\UsersRolesController@update')
    	->name('admin.users.roles.update');

    Route::middleware('role:Admin')
        ->put('users/{user}/permissions', 'App\Http\Controllers\Admin\UsersPermissionsController@update')
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

//Ruta Reportes
Route::get('/attendanceReport/attendanceToday', [App\Http\Controllers\AttendanceReportController::class, 'attendanceToday'])->name('attendanceReport.attendanceToday');
Route::get('/attendanceReport/workingAndFinished', [App\Http\Controllers\AttendanceReportController::class, 'getWorkingAndFinished'])->name('attendanceReport.workingAndFinished');
Route::get('/attendanceReport/finished', [App\Http\Controllers\AttendanceReportController::class, 'getFinished'])->name('attendanceReport.finished');
Route::get('/attendanceTime/attendanceNot', [App\Http\Controllers\AttendanceTimeController::class, 'attendanceNot'])->name('attendanceTime.attendanceNot');
Route::view('/counts', 'attendances.count')->name('attendances.count');
Route::get('/attendanceReport/logistic', [App\Http\Controllers\AttendanceReportController::class, 'logistics'])->name('attendanceReport.logistic');

//Generar calendarios
Route::get('/generar-calendarios', [App\Http\Controllers\CalendarController::class, 'calendarGenerator'])->name('calendars.generate');

//Importar excel
Route::post('import', [App\Http\Controllers\ImportController::class, 'import'])->name('import');

//Exportar excel
Route::post('export', [App\Http\Controllers\endowmentController::class, 'export'])->name('export');

Route::resource('contracts', App\Http\Controllers\contractsController::class);


Route::resource('endowments', App\Http\Controllers\endowmentController::class);

//Generar PDF
Route::get('/generar-acta-entrega/{id}', [App\Http\Controllers\endowmentController::class, 'generarActaEntrega'])->name('generar.acta.entrega');

//Generar PDF
Route::get('/generar-acta-entrega-card/{id}', [App\Http\Controllers\cardController::class, 'generarActaEntregaCard'])->name('generar.acta.entrega.card');

Route::resource('cards', App\Http\Controllers\cardController::class);

Route::get('/cards/employe/{id}', [App\Http\Controllers\CardController::class, 'showEmploye'])->name('cards.employe');
Route::get('/endowments/employe/{id}', [App\Http\Controllers\EndowmentController::class, 'showEmploye'])->name('endowment.employe');

Route::resource('medicines', App\Http\Controllers\MedicineController::class);

Route::get('/employees', [App\Http\Controllers\EmployeController::class, 'getEmployees'])->name('get.employee');
Route::get('/updateemployees', [App\Http\Controllers\EmployeController::class, 'updateEmployees'])->name('update.employee');

//Contracts
Route::get('/getContracts', [App\Http\Controllers\contractsController::class, 'getContracts'])->name('get.contracts');

Route::resource('invimaRegistrations', App\Http\Controllers\invima_registrationController::class);

Route::resource('medicationTemplates', App\Http\Controllers\medicationTemplateController::class);
