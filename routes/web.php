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
    return view('auth.login');
});

Auth::routes(['register' => false]);
// Auth::routes([
// Route::group(['middleware' => ['auth']], function() {
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:level_2']], function () {
Route::Resource('grade','GradeController');
Route::Resource('department','DepartmentController'); 
Route::Resource('entitleclass','EntitleClassController');
Route::Resource('designation','DesignationController');
Route::Resource('employee','EmpMastController');
Route::Resource('company','CompanyController');
//Route::Resource('TourRequest','TourRequestController');	
//Route::get('showrequest','TourRequestController@ShowRequest')->name('showrequest');
//Route::post('add-request','TourRequestController@RequestStatusmanager')->name('add-request');
// Route::resource('index/','TourRequestController@requestResponse')->name('RequestStatus');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');	

});

Route::group(['middleware' => ['role:users|manager']], function () {

//Route::Resource('TourRequest','TourRequestController');	

});

Route::group(['middleware' => ['role:manager|level_1|level_2|users']], function () {

Route::Resource('TourRequest','TourRequestController');

Route::get('showrequest','TourRequestController@ShowRequest')->name('showrequest');
Route::post('add-request','TourRequestController@RequestStatusmanager')->name('add-request');
Route::post('add-request-l1','TourRequestController@RequestStatusLevel1')->name('add-request-l1');
Route::post('add-request-l2','TourRequestController@RequestStatusLevel2')->name('add-request-l2');	
Route::Resource('grade','GradeController');
Route::Resource('department','DepartmentController'); 
Route::Resource('entitleclass','EntitleClassController');
Route::Resource('designation','DesignationController');
Route::Resource('employee','EmpMastController');
Route::Resource('company','CompanyController');

});