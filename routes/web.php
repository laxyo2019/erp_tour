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
Route::group(['middleware' => ['permission:delete_tour']], function () {
	Route::get('delete/{id}','MyTourRequestController@destroy')->name('delete');
	Route::get('tour_amount_delete/{id}','TABill\TourAmountBill@destroy')->name('tour_amount_delete');
});

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

Route::Resource('tour-policies','TourPoliciesController');

Route::get('tour-and-travel-policies','TourPoliciesController@TourAndTravelPolicies');

Route::Resource('tour-travel-category','TourTravelCategoryController');

/*For tour updradation request create for user  routes .............*/
Route::Resource('tour-exp-upgradation','TourExceptionUpgradController');

Route::get('tour-upgradation-list','TourExceptionUpgradController@ShowRequest')->name('tour-upgradation-list');

Route::post('tour-upgradation-request-approve-manager','TourExceptionUpgradController@RequestStatusmanager')->name('tour-upgradation-request-approve-manager');
Route::post('tour-upgradation-request-approve-l1','TourExceptionUpgradController@RequestStatusLevel1')->name('tour-upgradation-request-approve-l1');
Route::post('tour-upgradation-request-approve-l2','TourExceptionUpgradController@RequestStatusLevel2')->name('tour-upgradation-request-approve-l2');
/*end tour updradation request create  for user routes .............*/


/*For tour updradation request create for manager routes ..........*/

Route::Resource('tour-manager-upgradation','TourUpgradation\ForLevelManagerController');

Route::get('manager-upgradation-list','TourUpgradation\ForLevelManagerController@ShowRequest')->name('manager-upgradation-list');

Route::get('manager-upgradation-bill-request','TourUpgradation\ForLevelManagerController@create')->name('manager-upgradation-bill-request');

Route::post('approved-manager-upgradation-request','TourUpgradation\ForLevelManagerController@RequestStatusLevel1')->name('approved-manager-upgradation-request');

Route::post('approved-manager-upgradation-request-lelvel2','TourUpgradation\ForLevelManagerController@RequestStatusLevel2')->name('approved-manager-upgradation-request-lelvel2');


Route::Resource('tour-admin-upgradation','TourUpgradation\ForLevelOneController');

Route::get('level-1-upgradation-list','TourUpgradation\ForLevelOneController@ShowRequest')->name('level-1-upgradation-list');


Route::post('approved-admin-upgradation-request','TourUpgradation\ForLevelOneController@RequestStatusLevel2')->name('approved-admin-upgradation-request');


// Route::post('tb-upgradation','TourUpgradation\ForLevelOneController@tourBillUpgradation')->name('tb-upgradation');

Route::Resource('tour-bill-upgradation','TourUpgradation\TourUpgradationBillController');

Route::post('tb-upgradation','TourUpgradation\TourUpgradationBillController@create')->name('tb-upgradation');


Route::get('user-upgradation-bill','TourUpgradation\TourUpgradationBillController@ShowTourRequest')->name('user-upgradation-bill');

Route::post('user-tour-upg-approve-bill-by-manager','TourUpgradation\TourUpgradationBillController@TourRequesApprovemanager')->name('user-tour-upg-approve-bill-by-manager');

Route::post('user-tour-upg-bill-verify','TourUpgradation\TourUpgradationBillController@accountantVarifyBill')->name('user-tour-upg-bill-verify');

Route::post('user-tour-upgr-approve-bill-by-level1','TourUpgradation\TourUpgradationBillController@TourRequestLevel1')->name('user-tour-upgr-approve-bill-by-level1');

Route::post('user-tour-upgr-approve-bill-by-level2','TourUpgradation\TourUpgradationBillController@TourRequestLevel2')->name('user-tour-upgr-approve-bill-by-level2');

Route::post('user-tour-upg-approve-bill-by-accountant','TourUpgradation\TourUpgradationBillController@accountantBill')->name('user-tour-upg-approve-bill-by-accountant');




Route::Resource('manager-tour-upg-bill','TourUpdradationBill\TourUpdradationBillManger');

Route::post('tour-upgradation-manager-bill','TourUpdradationBill\TourUpdradationBillManger@create')->name('tour-upgradation-manager-bill');

Route::get('show-tour-upg-bill-of-manager','TourUpdradationBill\TourUpdradationBillManger@ShowTourRequest')->name('show-tour-upg-bill-of-manager');

Route::post('manager-tour-req-upg-bill-varification','TourUpdradationBill\TourUpdradationBillManger@accountantVarifyBill')->name('tour-req-upg-bill-varification');


Route::post('manager-req-upg-bill-approve-by-level1','TourUpdradationBill\TourUpdradationBillManger@TourRequestLevel1')->name('manager-req-upg-bill-approve-by-level1');

Route::post('manager-req-upg-bill-approve-by-level_2','TourUpdradationBill\TourUpdradationBillManger@TourRequestLevel2')->name('manager-req-upg-bill-approve-by-level_2');

Route::post('manager-req-upg-bill-approve-by-accountant','TourUpdradationBill\TourUpdradationBillManger@accountantBill')->name('manager-req-upg-bill-approve-by-accountant');



Route::Resource('level1-tour-upg-bill','TourUpdradationBill\TourUpdradationBillLevel1');

Route::post('tour-upgradation-level-1-bill','TourUpdradationBill\TourUpdradationBillLevel1@create')->name('tour-upgradation-level-1-bill');


Route::get('show-tour-upg-bill-of-level1','TourUpdradationBill\TourUpdradationBillLevel1@ShowTourRequest')->name('show-tour-upg-bill-of-level1');


Route::post('level1-tour-req-upg-bill-varification','TourUpdradationBill\TourUpdradationBillLevel1@accountantVarifyBill')->name('level1-tour-req-upg-bill-varification');

Route::post('level1-req-upg-bill-approve-by-level_2','TourUpdradationBill\TourUpdradationBillLevel1@TourRequestLevel2')->name('level1-req-upg-bill-approve-by-level_2');

Route::post('level1-req-upg-bill-approve-by-accountant','TourUpdradationBill\TourUpdradationBillLevel1@accountantBill')->name('level1-req-upg-bill-approve-by-accountant');

// Route::get('manager-upgradation-list','TourUpgradation\ForLevelOneController@ShowRequest')->name('manager-upgradation-list');

// route Resource paid unpaid amount


// });