<?php

class MyAccountController extends BaseController {

    public function formulario()
    {
    	return View::make('my-account', array('registroForm' => View::make('registro')));
    }
	
	public function actions(){
		return View::make('my-account-buttons');		
	}
}