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
		return Response::json( array( 'error' => TRUE ) );
	}
}


