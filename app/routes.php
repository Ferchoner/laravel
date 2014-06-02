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

Route::post('/logout', array( 'as' => 'logout', 'before'=>'auth', 'uses' => 'LoginController@logout') );

Route::get('/login', array( 'as' => 'login', 'before'=>'guest', 'uses' => 'LoginController@login') );

Route::get('/home', function(){ return View::make('home'); });

Route::get('/my-account-actions', array( 'uses'=>'MyAccountController@actions'));

Route::get('/my-account', array( 'before' => 'auth', 'uses'=>'MyAccountController@formulario'));

Route::post('/actualizar', array( 'before' => 'csrf|auth', 'uses'=>'MyAccountController@actualizar'));

Route::get('/maps', array( 'uses'=>'MapsController@showMap' ));

Route::get('/get-maps', array( 'uses'=>'MapsController@getNearStores' ));

Route::get('/create-coordinates', array( 'before' => 'auth', 'uses'=>'MapsController@createCoordinates' )); // actually not in use

Route::get('/admin', array('uses'=>'AdminController@indexAction'));

Route::post('/admin/login', array('uses'=>'AdminController@loginAction'));

Route::post('/admin/logout', array('uses'=>'AdminController@logoutAction'));

Route::get('/admin/posts', array('uses'=>'AdminController@viewPosts'));

Route::post('/admin/posts', array('uses'=>'AdminController@submitPost'));

/*
|--------------------------------------------------------------------------
| Application Composers
|--------------------------------------------------------------------------
|
| Here is where you can register all of the composers for an application.
|
*/

View::composer('registro', function($view)
{
	$arrayDays['dia'] = 'Dia';
	$arrayMonths['mes'] = 'Mes';
	$arrayYears['anio'] = 'Año';
	$estadosCorrecto['estado'] = 'Estado';		
	for( $i=1; $i < 32; $i++)
		$arrayDays[($i < 10 ? '0' . $i : $i)] = $i;
	for ($i=1; $i < 13; $i++) 
		$arrayMonths[($i < 10 ? '0' . $i : $i)] = $i;
	for ($i=date('Y')-18; $i > 1910; $i--) 
		$arrayYears[$i] = $i;	
	$estados = Estado::all();	
	foreach ($estados as $key => $value) {
		$estadosCorrecto[$value['id']] = $value['nombre'];
	}
    $view->with('arrayDays', $arrayDays);
	$view->with('arrayMonths', $arrayMonths);
	$view->with('arrayYears', $arrayYears);
	$view->with('estados', $estadosCorrecto);
});