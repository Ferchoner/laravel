<?php

class RegistroController extends BaseController {

    public function registro()
    {
    	$arrayDays['dia'] = 'Dia';
		$arrayMonths['mes'] = 'Mes';
		$arrayYears['anio'] = 'Año';		
		for( $i=1; $i < 32; $i++)
			$arrayDays[($i < 10 ? '0' . $i : $i)] = $i;
		for ($i=1; $i < 13; $i++) 
			$arrayMonths[($i < 10 ? '0' . $i : $i)] = $i;
		for ($i=2013; $i > 1910; $i--) 
			$arrayYears[$i] = $i;
		return View::make('registro', array('arrayDays' => $arrayDays, 'arrayMonths' => $arrayMonths, 'arrayYears' => $arrayYears));
    }
}


