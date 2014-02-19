<?php

class StoresTableSeeder extends Seeder {
 
    public function run()
    {
        $estados = array(         
			array('name' => 'Oxxo Ventura Puente - Lazaro Cardenas','address' => 'Ventura Puente 770, Ventura Puente, 58020 Morelia, Michoacán','lat' => '19.696183','lng' => '-101.176196'),
			array('name' => 'Oxxo Francisco Marquez Prepa 3','address' => 'Francisco Márquez 220, Chapultepec Norte, 58260 Morelia, Michoacán','lat' => '19.692647','lng' => '-101.179334'),
			array('name' => 'Oxxo Mariano Jimenez - Blvrd. Garcia de Leon','address' => 'Mariano Jimenez 285, 58280 Morelia, Michoacán','lat' => '19.690567','lng' => '-101.177446'),
			array('name' => 'Oxxo San Rafael','address' => 'San Rafael, Morelia, Michoacán','lat' => '19.700900','lng' => '-101.154943'),
			array('name' => 'Oxxo Feliz Ireta','address' => 'José María Morelos 1690, Félix Ireta, 58070 Morelia, Michoacán','lat' => '19.685597','lng' => '-101.191962'),
			array('name' => 'Oxxo Plaza Camelinas','address' => 'Paseo De La Republica 1002, 58255 Morelia, Michoacán','lat' => '19.681000','lng' => '-101.182762'),
			array('name' => 'Oxxo Dr. Ignacio Chavez','address' => 'Av Solidaridad s/n, Camelinas, Morelia, Michoacán','lat' => '19.685064','lng' => '-101.170226'),
			array('name' => 'Oxxo Chapultepec Oriente','address' => 'Avenida Solidaridad 960 Camelinas, 58087 Morelia, Michoacán','lat' => '19.684945','lng' => '-101.167426'),
			array('name' => 'Oxxo Madero','address' => 'Francisco I. Madero Oriente 602, 58000 Morelia, Michoacán','lat' => '19.702834','lng' => '-101.185994'),
			array('name' => 'Oxxo Isaac Arriaga','address' => 'Paseo de la República 139, Isaac Arriaga, 58210 Morelia, Michoacán','lat' => '19.723332','lng' => '-101.193432'),
			array('name' => 'Oxxo Torremolinos','address' => 'Ramón Favie, Jardines de Torremolinos, 58197 Morelia, Michoacán','lat' => '19.678975','lng' => '-101.225849'),
			array('name' => 'Oxxo Boulevard','address' => 'Boulevard García de León, Chapultepec Oriente, Morelia, Michoacán, México','lat' => '19.688633','lng' => '-101.163888'),
			array('name' => 'Oxxo Santa Maria','address' => 'Lomas de Santa María, Morelia, Michoacán, México','lat' => '19.675199','lng' => '-101.185705'),
		);
		
        DB::table('stores')->insert($estados);
    }
 
}