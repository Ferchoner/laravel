<?php

class RegistroController extends BaseController {

    public function formulario()
    {
    	$arrayDays['dia'] = 'Dia';
		$arrayMonths['mes'] = 'Mes';
		$arrayYears['anio'] = 'Año';		
		for( $i=1; $i < 32; $i++)
			$arrayDays[($i < 10 ? '0' . $i : $i)] = $i;
		for ($i=1; $i < 13; $i++) 
			$arrayMonths[($i < 10 ? '0' . $i : $i)] = $i;
		for ($i=date('Y')-18; $i > 1910; $i--) 
			$arrayYears[$i] = $i;
		$estados = Estado::all();
		return View::make('registro', array('arrayDays' => $arrayDays, 'arrayMonths' => $arrayMonths, 'arrayYears' => $arrayYears, 'estados' => $estados));
    }
	
	public function getCities(){
		if ( Input::has('id') ) {
			return Response::json( Ciudad::where( 'id_estado', '=', Input::get('id') )->get() );
		}
		return Response::json( array('error' => 'true', 'errorMessage'=>'No hay identificador') );
	}
	
	public function registrarUsuario(){
		
		$data = Input::all();
		$data['dob'] = Input::get('anio').'-'.Input::get('mes').'-'.Input::get('dia');
		
		$validaciones = array( 
	    	array('nombre' => 'required|alpha|between:4,30'),
		    array('apellido' => 'required|alpha|between:4,30'),
		    array('sexo' => 'required|alpha'),
		    array('dob' => 'date_format:Y-m-d'),
		    array('email' => 'required|email|between:6,80'),
			array('password' => 'required|between:8,16'),
			array('physical_address' => 'required|between:8,80'),
			array('estado' => 'required|exist:estado,id'),
			array('ciudad' => 'required|exist:ciudades,id'),							
		);		
		$validador = Validator::make( $data, $validaciones);
		if ( $validador->fails() )
			return Response::json( $validador->messages() );
				
		if( Usuario::where( 'email', '=', Input::get('email') )->count() > 0 )
			return Response::json( array( 'error' => TRUE, 'message' => 'El correo ya esta registrado' ) );
		
		$newUser = new Usuario();
		$newUser->nombre = Input::get('nombre');
		$newUser->apellido = Input::get('apellido');
		$newUser->sexo = Input::get('sexo');
		$newUser->email = Input::get('email');
		$newUser->password =  Hash::make( Input::get('password') );
		$newUser->date_birth = Input::get('anio').'-'.Input::get('mes').'-'.Input::get('dia').' 00:00:00';
		$newUser->address = Input::get('physical_address');
		$newUser->estado = Input::get('estado');
		$newUser->ciudad = Input::get('ciudad');		
		
		if ( !$newUser->save() ) {
			return Response::json( array( 'error' => TRUE, 'message' => 'No se pudo almacenar su informacion' ) );	
		}		
		return Response::json( array( 'error' => FALSE, 'id' => $newUser->id ) );
	}
}


