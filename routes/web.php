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
    return view('main');
});

/* companies */
Route::get('companies', [
    'as' => 'companies', 'uses' => 'CompaniesController@showCompanies'
]);
Route::match(['get', 'post'], '/companies/add', [
    'as' => 'company_add', 'uses' => 'CompaniesController@addCompany'
]);

/* employee */
Route::get('employees', [
    'as' => 'employees', 'uses' => 'EmployeesController@showEmployees'
]);
Route::match(['get', 'post'], '/employees/add', [
    'as' => 'employee_add', 'uses' => 'EmployeesController@addEmployee'
]);



/*Route::group(['as' => 'admin::'], function () {
    Route::get('companies', ['as' => 'companies', function () {
        // Маршрут назван "admin::dashboard"
    }]);
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
