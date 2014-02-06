<?php

class LoginController extends BaseController {
	
	public function login(){
		
		$email = trim(Input::get('usuario'));
        
		$password = Input::get('pass');
		
		$user = Usuario::where('email', '=', trim(Input::get('usuario')))->get();
		
        /*if (Hash::check($password, $user->password))
        {
        	return Response::json( array( 'error' => FALSE, 'message' => 'Bienvenido!!' ) );   
        }
		*/
		var_dump( $user);
		return Response::json( array( 'error' => TRUE, 'message' => 'No podemos logearte' ) );
	}
	
	public function logout(){
		
	}
}