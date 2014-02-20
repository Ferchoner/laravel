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
		$n = Input::get('n', 5);
		if( $lat AND $lng){
			$points = DB::select( DB::raw('
				SELECT id, name, address, lat, lng, ( 3959 * acos( cos( radians( :latitude1 ) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians( :longitude ) ) + sin( radians( :latitude2 ) ) * sin( radians( lat ) ) ) ) AS distance 
				FROM stores 
				HAVING distance < :distance ORDER BY distance LIMIT :begins , :number
			'), array('latitude1'=>$lat, 'longitude'=>$lng, 'latitude2'=>$lat, 'distance'=>$dst, 'begins'=>$i, 'number'=>$n));
			
			return Response::json($points);
		}
		
		return Response::json(array('error'=>TRUE,'message'=>'missing data'));
	}    
}


