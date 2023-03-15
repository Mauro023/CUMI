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

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::resource('users', App\Http\Controllers\Admin\UsersController::class, ['as' => 'admin']);
});

Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('employes', App\Http\Controllers\employeController::class);
