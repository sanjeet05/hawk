<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    // return view('index');
    return view('index');
});
// Route::group(['prefix' => 'api/v1'], function(){
//   Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
//   Route::post('authenticate', 'AuthenticateController@authenticate');
//   Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
// });


// route for generate the token
Route::group(['middleware' => 'cors', 'prefix' => 'api/v1'], function () {
    Route::post('signup', 'LoginController@signup');
    Route::post('authenticate/login', 'LoginController@login');

});

// need to have token for user route
Route::group(['middleware' => 'cors', 'prefix' => 'api/v1/user'], function () {
    Route::group(['middleware' => 'jwt-auth'], function () {
    	Route::get('getUserDetails', 'UserHomeController@getUserDetails');
      Route::post('updateProfile', 'UserHomeController@updateProfile');
    });
});

// need to have token for admin route
Route::group(['middleware' => 'cors', 'prefix' => 'api/v1/admin'], function () {
    Route::group(['middleware' => 'jwt-auth'], function () {
    	Route::get('getAllUsers', 'AdminHomeController@getAllUsers');
      Route::post('updateUser', 'AdminHomeController@updateUser');
      Route::post('deleteUser', 'AdminHomeController@deleteUser');
    });
});
// Route::get('/login', 'LoginController@index');
