<?php

class MapsController extends BaseController {
	
	function showMap(){
		return View::make('maps');
	}
	
	function getNearStores( ){
		// ;
		$lat = Input::get('ltd', FALSE);
		$lng = Input::get('lng', FALSE);
		$dst = Input::get('dst', 25);
		$i = Input::get('i', 0);
		$n = Input::get('n', 10);
		$address = Input::get('address', FALSE);
		if( $lat AND $lng)
		{
			$points = Store::getNear( $lat, $lng, $dst, $i, $n );
			$morePoints = array();
			if ( $address AND strlen($address) > 4 AND count($points) < $n )
			{
				$morePoints = Store::getByAddress( $address, $i, ($n - count($points)));				
				if( $morePoints ) $morePoints = array();
			}
			return Response::json(array_merge($points, $morePoints));
		}
		return Response::json(array('error'=>TRUE,'message'=>'missing data'));
	}
	
	function createCoordinates(){
		$coordenadas = PsStore::whereRaw('latitude = 0 AND longitude = 0')->take(110)->get();		
		return View::make('creating-coordinates', array('coordenadas'=>$coordenadas));
	}
}
