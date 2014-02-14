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
	
	public function actions(){
		return View::make('my-account-buttons');		
	}
}