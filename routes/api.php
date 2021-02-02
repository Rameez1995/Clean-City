<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Auth::routes();


Route::group(['prefix' => 'admin'], function () {

    Route::post('/login', 'App\Http\Controllers\Admin\UserController@login')->name('login');
    Route::post('/login', 'App\Http\Controllers\Admin\UserController@login')->name('login');

    Route::group(['middleware' => ['auth:api'], 'namespace' => 'App\Http\Controllers\Admin'], function () {

        Route::get('/verify', 'UserController@verify');
        Route::get('/userdata', 'UserController@userdata');
        Route::post('/editUser', 'UserController@update');
        Route::post('/changepassword', 'UserController@changepassword');
        Route::post('/profilephoto', 'UserController@profilephoto');
        Route::get('/getallusers', 'UserController@index');
        Route::get('/getalluserstofrom', 'UserController@indexToFrom');
        Route::post('/blockuser', 'UserController@blockuser');
        Route::get('/user', 'UserController@singleUser');

        //Services
        Route::get('/getallservices', 'ServiceController@index');
        Route::get('/service', 'ServiceController@show');
        Route::post('/addservice', 'ServiceController@store');
        Route::post('/updateService', 'ServiceController@update');

        //Package
        Route::get('/getallpackages', 'PackageController@index');
        Route::post('/addpackage', 'PackageController@store');
        Route::get('/package', 'PackageController@show');
        Route::put('/package', 'PackageController@update');

        //PackageRequests
        Route::get('/getallPackageRequests','PackageRequestController@index');
        Route::get('/PackageRequests','PackageRequestController@show');
        Route::post('/approveRejectPackage','PackageRequestController@acceptOrReject');

        //ServiceBooking
        Route::get('/getallServiceRequests','ServiceBookingController@index');
        Route::get('/ServiceRequests','ServiceBookingController@show');
        Route::post('/approveRejectService','ServiceBookingController@approveReject');





        




        


    });
});