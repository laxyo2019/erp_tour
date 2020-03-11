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
Route::get('login/{email}/{pass}','LoginController@login');
Route::post('logoutAll','LoginController@logout')->name('logoutAll');

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:tour_superadmin']], function () {
Route::Resource('grade','GradeController');
Route::Resource('department','DepartmentController'); 
Route::Resource('entitleclass','EntitleClassController');
Route::Resource('designation','DesignationController');
Route::Resource('employee','EmpMastController');
Route::Resource('company','CompanyController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');	
Route::Resource('tour-rate','TourRateController');
Route::Resource('metropolitan-tour-rate','MetropolitanRateController');
Route::Resource('users','UserController');
Route::Resource('add-branch','BranchController');
});

Route::group(['middleware' => ['role:users|manager']], function () {
});

// Route::group(['middleware' => ['role:manager|level_1|level_2|users|accountant']], function () {

Route::Resource('TourRequest','MyTourRequestController');
Route::post('rate-multiple','MyTourRequestController@tourRateMultiple')->name('rate-multiple');

Route::post('metro-rate-multiple','MyTourRequestController@mertroTourRateMultiple')->name('metro-rate-multiple');
// Route::Resource('TourRequest','t\Tours');

Route::get('showrequest','MyTourRequestController@ShowRequest')->name('showrequest');
Route::post('add-request','MyTourRequestController@RequestStatusmanager')->name('add-request');
Route::post('add-request-l1','MyTourRequestController@RequestStatusLevel1')->name('add-request-l1');
Route::post('add-request-l2','MyTourRequestController@RequestStatusLevel2')->name('add-request-l2');	
Route::post('accountant','MyTourRequestController@RequestStatusAccountant')->name('accountant');

Route::Resource('grade','GradeController');
Route::Resource('department','DepartmentController'); 
Route::Resource('entitleclass','EntitleClassController');
Route::Resource('designation','DesignationController');
Route::Resource('employee','EmpMastController');
Route::Resource('company','CompanyController');

Route::Resource('tour-amount-bill','TABill\TourAmountBill');

Route::post('tour-bill-amount','TABill\TourAmountBill@create');


// Route::Resource('local-tour-amount-bill','LocalTaBill\LocalTaBillAmt');

Route::get('tour-bill-request','TABill\TourAmountBill@ShowTourRequest')->name('tour-bill-request');

Route::post('tour-add-request','TABill\TourAmountBill@TourRequestStatusmanager')->name('tour-add-request');
Route::post('tour-add-request-l1','TABill\TourAmountBill@TourRequestStatusLevel1')->name('tour-add-request-l1');
Route::post('tour-add-request-l2','TABill\TourAmountBill@TourRequestStatusLevel2')->name('tour-add-request-l2');

Route::get('download/{id}/{key}','TABill\TourAmountBill@download')->name('download');

// route for paid unpaid amount
Route::post('accountant-bill','TABill\TourAmountBill@accountantBill')->name('accountant-bill');
Route::post('tour-bill-varify','TABill\TourAmountBill@accountantVarifyBill')->name('tour-bill-varify');
// route for paid unpaid amount


// });