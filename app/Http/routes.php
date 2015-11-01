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

// ruta laravel
Route::get('/', function () {
    return view('site.home');
});
/**
 *	Authentication routes...
 *	Route::get('auth/login', 'Auth\AuthController@getLogin');
 *  Route::post('auth/login', 'Auth\AuthController@postLogin');
 *  Route::get('auth/logout', 'Auth\AuthController@getLogout');
 *  Registration routes...
 *  Route::get('auth/register', 'Auth\AuthController@getRegister');
 *  Route::post('auth/register', 'Auth\AuthController@postRegister');
 */
Route::controllers([
	'redes'    => 'RedesController', // redes sociales
	'auth'     => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
// rutas auth
Route::group(['middleware' => 'auth'], function(){
	Route::get('home', function(){
		return view('site.site');
	});
});
// ruta login api`s
Route::post('oauth/access_token', function(){
	return Response::json(Authorizer::issueAccessToken());
});
// rutas api`s
Route::group(['before' => 'oauth'], function(){
	Route::resource('post', 'ApiController', ['except' => ['create', 'edit']]);
});
// ruta Angular
Route::get('angular', function(){
	return view('angular');
});