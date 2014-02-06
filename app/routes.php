<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array( 'as' => 'index', 'uses' => 'HomeController@showHome' ) );

Route::post('/registrar', array('before' => 'csrf|guest', 'uses' => 'RegistroController@registrarUsuario') );

Route::get('/registro', array( 'as' => 'registro', 'before'=>'guest', 'uses' => 'RegistroController@formulario') );

Route::get('/get-cities', array( 'as' => 'ciudades', 'uses' => 'RegistroController@getCities') );

Route::post('/authentication', array( 'as' => 'authUser', 'before'=>'guest', 'uses' => 'LoginController@authenticate') );

Route::post('/logout', array( 'as' => 'logout', 'uses' => 'LoginController@logout') );

Route::get('/login', array( 'as' => 'login', 'before'=>'guest', 'uses' => 'LoginController@login') );

Route::get('/home', function(){
	return View::make('home'); 
});

Route::get('/my-account', function(){
	return View::make('my-account-profile'); 
});
