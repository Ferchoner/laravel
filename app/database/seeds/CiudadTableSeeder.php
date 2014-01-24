<?php

class CiudadTableSeeder extends Seeder {
 
    public function run()
    {
        $ciudades = array(         
			array('nombre' => 'Tijauna', 'id_estado' => '3'),
			array('nombre' => 'Mexicali', 'id_estado' => '2'),
			array('nombre' => 'Ciudad Juárez', 'id_estado' => '2'),
			array('nombre' => 'Chihuahua', 'id_estado' => '6'),
			array('nombre' => 'Guadalajara', 'id_estado' => '14'),
			array('nombre' => 'Chapala', 'id_estado' => '14'),
			array('nombre' => 'Zacapu', 'id_estado' => '16'),
			array('nombre' => 'Tuxtla Gutiérrez', 'id_estado' => '5'),
			array('nombre' => 'León', 'id_estado' => '11'),
			array('nombre' => 'Aguascalientes', 'id_estado' => '1'),
			array('nombre' => 'Los Cabos', 'id_estado' => '3'),
			array('nombre' => 'Cancún', 'id_estado' => '23'),
			array('nombre' => 'Ciudad de México', 'id_estado' => '9'),
			array('nombre' => 'Puebla', 'id_estado' => '21'),
			array('nombre' => 'Monterrey', 'id_estado' => '19'),
			array('nombre' => 'Nezahualcóyotl', 'id_estado' => '15'),
			array('nombre' => 'San Luis Potosí', 'id_estado' => '24'),
			array('nombre' => 'Mérida', 'id_estado' => '31'),
			array('nombre' => 'Hermosillo', 'id_estado' => '26'),
			array('nombre' => 'Saltillo', 'id_estado' => '7'),
			array('nombre' => 'Culiacán', 'id_estado' => '25'),
			array('nombre' => 'Guadalupe', 'id_estado' => '19'),
			array('nombre' => 'Acapulco', 'id_estado' => '12'),
			array('nombre' => 'Tlalnepantla', 'id_estado' => '15'),
			array('nombre' => 'Querétaro', 'id_estado' => '22'),
			array('nombre' => 'Chimalhuacán', 'id_estado' => '15'),
			array('nombre' => 'Torreón', 'id_estado' => '7'),
			array('nombre' => 'Reynosa', 'id_estado' => '28'),
			array('nombre' => 'Tlaquepaque', 'id_estado' => '14'),
			array('nombre' => 'Durango', 'id_estado' => '10'),
			array('nombre' => 'Veracruz', 'id_estado' => '30'),
			array('nombre' => 'Xalapa', 'id_estado' => '30'),
			array('nombre' => 'Mazatlán', 'id_estado' => '25'),
			array('nombre' => 'Pachuca', 'id_estado' => '13'),
			array('nombre' => 'Uruapan', 'id_estado' => '16'),
		);
		
        DB::table('ciudades')->insert($ciudades);
    }
 
}