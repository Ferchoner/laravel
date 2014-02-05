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

Route::post('/registrar', array('before' => 'csrf', 'uses' => 'RegistroController@registrarUsuario') );

Route::get('/registro', array( 'as' => 'registro', 'uses' => 'RegistroController@formulario') );

Route::get('/get-cities', array( 'as' => 'ciudades', 'uses' => 'RegistroController@getCities') );

Route::post('/authentication', array( 'as' => 'authUser', 'uses' => 'LoginController@login') );

Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/home', function()
{
	return View::make('home');
});