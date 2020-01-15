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
// Route::get('/home','ViewController@view')->name('home');
Route::Resource('grade','GradeController');
Route::Resource('department','DepartmentController'); 
Route::Resource('entitleclass','EntitleClassController');
Route::Resource('designation','DesignationController');
Route::Resource('employee','EmpMastController');
Route::Resource('company','CompanyController');
Route::Resource('TourRequest','TourRequestController');	
Route::get('index','TourRequestController@ShowRequest')->name('showrequest');
Route::get('index/{id}/{app}','TourRequestController@RequestStatus')->name('RequestStatus');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');	
