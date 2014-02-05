<?php

class LoginController extends BaseController {
	
	public function login(){
		
		$email = mb_strtolower(trim(Input::get('email')));
        
		$password = Input::get('pass');
 		
		//return Response::json( array( 'password' => $password, 'encripted' => Hash::make($password) ) );
		
        if (Auth::attempt(array('email' => $email, 'password' => $password)))
        {
        	return Response::json( array( 'error' => FALSE, 'message' => 'Bienvenido!!' ) );   
        }
		
		return Response::json( array( 'error' => TRUE, 'message' => 'No podemos logearte' ) );
	}
	
	public function logout(){
		
	}
}