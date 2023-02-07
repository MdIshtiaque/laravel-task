<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LoginController;
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
    return view('welcome');
});

Route::get('login',[LoginController::class, 'index'])->name("login");
Route::post('login',[LoginController::class, 'login']);
Route::get('logout',[LoginController::class, 'logout'])->name("logout");

Route::middleware("custom-auth")->group(function(){
    Route::resource('/company', CompaniesController::class);
    Route::resource('/employee', EmployeesController::class);
});


