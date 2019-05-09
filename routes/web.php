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
Route::match(['get', 'post'], 'companies/del/{id}', [
    'as' => 'company_delete', 'uses' => 'CompaniesController@delete'
])->where(['id' => '[0-9]+']);
Route::match(['get', 'post'], 'companies/edit/{id}', [
    'as' => 'company_edit', 'uses' => 'CompaniesController@edit'
])->where(['id' => '[0-9]+']);
Route::get('companies/view/{id}', [
    'as' => 'company_view', 'uses' => 'CompaniesController@view'
])->where(['id' => '[0-9]+']);

/* employee */
Route::get('employees', [
    'as' => 'employees', 'uses' => 'EmployeesController@showEmployees'
]);
Route::match(['get', 'post'], '/employees/add', [
    'as' => 'employee_add', 'uses' => 'EmployeesController@addEmployee'
]);
Route::match(['get', 'post'], '/employees/del/{id}', [
    'as' => 'employee_delete', 'uses' => 'EmployeesController@delete'
])->where(['id' => '[0-9]+']);
Route::match(['get', 'post'], '/employees/edit/{id}', [
    'as' => 'employee_edit', 'uses' => 'EmployeesController@edit'
])->where(['id' => '[0-9]+']);


/*Route::group(['as' => 'admin::'], function () {
    Route::get('companies', ['as' => 'companies', function () {
        // Маршрут назван "admin::dashboard"
    }]);
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
