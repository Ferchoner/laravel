<?php

class LoginController extends BaseController {
	
	public function Authenticate(){
		
		$email = trim(Input::get('usuario'));
        
		$password = Input::get('pass');
		
		$user = Usuario::where('email', 'like', trim(Input::get('usuario')))->first();
		
		if ( count($user) <= 0 )
			return Response::json( array( 'error' => TRUE, 'message' => 'El usuario no existe' ) );

        if ((Auth::attempt(array('email'=>$email, 'password'=>$password))))
        {
        	return Response::json( array( 'error' => FALSE, 'message' => 'Bienvenido!!' ) );   
        }
		
		return Response::json( array( 'error' => TRUE, 'message' => 'Correo o Password Incorrecto' ) );
	}
	
	public function logout(){
		 
        Auth::logout();
        
        return Response::json( array( 'error' => FALSE, 'message' => 'Hasta pronto, gracias por su visita' ) );;
	}
	
	public function login(){
		return View::make('login'); 
	}
}