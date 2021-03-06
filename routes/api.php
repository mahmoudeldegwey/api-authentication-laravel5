<?php

use Illuminate\Http\Request;

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
Route::group(['prefix' => 'auth'], function () {

    Route::post('login', 'API\UserController@login');
    Route::post('signup', 'API\UserController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'API\UserController@logout');
        Route::get('user', 'API\UserController@user');
    });
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
