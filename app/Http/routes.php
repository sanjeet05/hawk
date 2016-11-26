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

// need to have token
Route::group(['middleware' => 'cors', 'prefix' => 'api/v1'], function () {
    Route::group(['middleware' => 'jwt-auth'], function () {
    	Route::get('get_user_details', 'LoginController@get_user_details');
    });
});

// Route::get('/login', 'LoginController@index');
