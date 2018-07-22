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

use App\Organisation;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'backend'], function () {
        Route::group(['namespace' => 'Backend'], function () {
            Route::get('/employees', 'EmployeeController@index');
            Route::post('/employee', 'EmployeeController@store');
            Route::delete('/employee/{employee}', 'EmployeeController@destroy');

            Route::get('/organisations', 'OrganisationController@index');
            Route::post('/organisation', 'OrganisationController@store');
            Route::delete('/organisation/{organisation}', 'OrganisationController@destroy');
            Route::get('/organisation/{organisation}/edit', 'OrganisationController@edit');
            Route::put('/organisation/{organisation}', 'OrganisationController@update');

            Route::get('/departments', 'DepartmentController@index');
            Route::post('/department', 'DepartmentController@store');
            Route::delete('/department/{department}', 'DepartmentController@destroy');

            Route::get('/positions', 'PositionController@index');
            Route::post('/position', 'PositionController@store');
            Route::delete('/position/{position}', 'PositionController@destroy');
        });
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/organisations', 'CommonController@showOrganisationsPhones');
Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');
Route::get('/organisations/employees', 'CommonController@getOrganisationEmployees')->name('employees_by_organisation');