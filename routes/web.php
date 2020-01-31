<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/employees', 'EmployeeController');
Route::put('/employees/enable/{employee}', 'EmployeeController@enable')->name('employees.enable');
Route::put('/employees/disable/{employee}', 'EmployeeController@disable')->name('employees.disable');