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

Route::post('/registrar', array('before' => 'validarInforRegistro', 'uses' => 'HomeController@registrarUsuario') );

/* 
 * Se cambio para usar layouts y controlladores
 * a HomeController
Route::get('/home', function()
{
	return View::make('principal');
});
*/
Route::get('/home', function()
{
	return View::make('home');
});

Route::get('/registro', array( 'as' => 'registro', 'uses' => 'RegistroController@registro') );

Route::get('/login', function()
{
	return View::make('login');
});