<?php

class Store extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stores';	

	/**
	 * Get the unique identifier for the estate.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
	
	public static function getNear( $lat, $lng, $dst = 3, $i = 0, $n = 10)
	{
		return DB::select( DB::raw('
			SELECT id, name, address, lat, lng, ( 3959 * acos( cos( radians( :latitude1 ) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians( :longitude ) ) + sin( radians( :latitude2 ) ) * sin( radians( lat ) ) ) ) AS distance 
			FROM stores
			HAVING distance < :distance 
			ORDER BY distance 
			LIMIT :begins , :number
		'), array('latitude1'=>$lat, 'longitude'=>$lng, 'latitude2'=>$lat, 'distance'=>$dst, 'begins'=>$i, 'number'=>$n));		
	}
	
	public static function getByAddress( $address, $i = 0, $n = 10)
	{		
		return DB::select( DB::raw('
			SELECT id, name, address, lat, lng 
			FROM stores 
			WHERE name LIKE \':address1\' OR address LIKE \':address2\'
			LIMIT :number
			'), array('address1'=>('%'.$address.'%'), 'address2'=>('%'.$address.'%'), 'number'=>(int)$n));
	}
}