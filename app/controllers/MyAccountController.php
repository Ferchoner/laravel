<?php

class MyAccountController extends BaseController {

    public function formulario()
    {
    	if( Auth::check()){
    		$dateArray = explode('-', Auth::user()->date_birth );	 
    		return View::make('my-account', array('registroForm' => View::make('registro', array( 'anioUser'=>$dateArray[0], 'mesUser'=>$dateArray[1], 'diaUser'=>substr($dateArray[2], 0, 2)))));
		}
		return Response::json( array('error' => TRUE, 'message'=> 'Necesitas estar logeado para acceder a esta vista') );
    }
	
	public function actualizar(){
		if( Auth::check() )
			$user = Usuario::find(Auth::user()->id);
		else
			return Response::json( array( 'error' => TRUE, 'message' => 'You are not logged in' ) );

		$data = Input::all();
		
		$data['dob'] = Input::get('anio').'-'.Input::get('mes').'-'.Input::get('dia');
		
		$validaciones = array( 
	    	array('nombre' => 'sometimes|alpha|between:4,30'),
		    array('apellido' => 'sometimes|alpha|between:4,30'),
		    array('sexo' => 'sometimes|alpha'),
		    array('dob' => 'date_format:Y-m-d'),
		    array('email' => 'sometimes|email|between:6,80'),
		    array('password' => 'required_if:new_password,>,0'),
			array('new_password' => 'sometimes|between:8,16'),
			array('physical_address' => 'sometimes|between:8,80'),
			array('estado' => 'sometimes|exist:estado,id'),
			array('ciudad' => 'sometimes|exist:ciudades,id'),							
		);
		$validador = Validator::make($data, $validaciones);
		
		if ( $validador->fails() )
			return Response::json( $validador->messages() );
		
		if(!empty($data['new_password'])){
			if( empty($data['password']) AND Auth::validate() )
				return Response::json( array( 'error' => TRUE, 'message' => 'Si quieres cambiar tu contraseña por favor escribe tu contraseña anterior' ) );
			else 
				$data['password'] = $data['new_password'];
			unset( $data['new_password'] );
		}
		
		foreach ($data as $key => $value)
			if( !empty($value) AND isset( $user->$key ) AND $value != 'dia' AND $value != 'mes' AND $value != 'anio' AND $value != 'Estado' AND $value != 'Ciudad' AND $value != 'estado' AND $value != 'ciudad')
				$user->$key = $value;
				
		if ( !$user->save() )
			return Response::json( array( 'error' => TRUE, 'message' => 'No se pudo almacenar su informacion' ) );
		
		return Response::json( array( 'error' => FALSE, 'id' => $user->id ) ); 
	}
	
	public function actions(){
		return View::make('my-account-buttons');	
	}
}