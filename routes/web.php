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

Auth::routes();

//Signup
Route::post('/user_register','SignupController@user_register');

Route::get('/user_email_confirm','SignupController@user_email_confirm');
Route::post('/user_activate','SignupController@user_activate');

// Site routes
Route::get('/lang/{lang}',[

	'uses' => 'SiteController@LangSwitcher',
	'as' => 'lang.switch'

]);

Route::get('/','SiteController@index');
Route::get('/home','SiteController@index');
Route::get('/plates','SiteController@plates');
Route::get('/plate/{slug}','SiteController@showplate');


Route::get('/all_plate_canvas','SiteController@all_plate_canvas');
Route::get('/show_plate_canvas/{slug}','SiteController@show_plate_canvas');

Route::get('/numbers','SiteController@numbers');
Route::get('/number/{slug}','SiteController@shownumber');
Route::get('/number_canvas','SiteController@number_canvas');
Route::get('/show_number_canvas/{slug}','SiteController@show_number_canvas');
Route::get('/seller/{profile}','SiteController@seller');

//more links
Route::get('/about','SiteController@about');
Route::get('/terms_condition','SiteController@terms_condition');
Route::get('/privacy','SiteController@privacy');
Route::get('/pricing','SiteController@pricing');
Route::get('/refund_policy','SiteController@refund_policy');
Route::get('/contact','SiteController@contact');


// Plate routes
Route::group(['middleware' => 'prevent-back-history'],function(){

// old single print
Route::get('/CreatePlate','PlateController@CreatePlate');
Route::post('/makeplate','PlateController@makeplate');

Route::get('/car_plate','PlateController@car_plate');
Route::post('/car_plate','PlateController@car_plate_store');


Route::get('/bulkplate','PlateController@bulkplate');
Route::post('/bulkplate','PlateController@bulkplatestore');
Route::get('/download_canvas','PlateController@download_canvas');


Route::get('/color_plate','PlateController@color_plate');
Route::post('/color_plate','PlateController@color_plate_store');
Route::get('/plate_delete/{slug}','PlateController@plate_delete');


// Mobile route
Route::get('/mobile_create','MobileController@mobile_create');
Route::post('/mobile_create','MobileController@mobile_store');
Route::get('/mobile_bulk','MobileController@mobile_bulk');
Route::post('/mobile_bulk','MobileController@mobile_bulk_store');
Route::get('/mobile_delete/{slug}','MobileController@mobile_delete');


Route::get('/home', 'HomeController@index')->name('home');

// User update
Route::get('/change_password','UserController@change_password');
Route::post('/change_password','UserController@changePassword');
Route::get('/myprofile','UserController@myprofile');
Route::post('myprofile_update','UserController@myprofile_update');

// admin route
Route::get('/sponsors','SponsorController@index');
Route::post('/sponsor','SponsorController@update');
Route::get('/members','AdminController@index');
Route::get('/member/delete/{id}','AdminController@delete');


});
// end back history