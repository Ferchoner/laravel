<?php

class MapsController extends BaseController {
	
	function showMap(){
		return View::make('maps');
	}
	
	function getNearStores($lat, $lng, $dst, $n ){
		// SELECT id, ( 3959 * acos( cos( radians(37) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(-122) ) + sin( radians(37) ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < 25 ORDER BY distance LIMIT 0 , 20;
	}    
}


