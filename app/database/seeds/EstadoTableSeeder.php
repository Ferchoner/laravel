<?php

class EstadoTableSeeder extends Seeder {
 
    public function run()
    {
        $estados = array(         
			array('nombre' => 'Aguascalientes (AGS)'),
			array('nombre' => 'Baja California Norte (BCN)'),
			array('nombre' => 'Baja California Sur (BCS)'),
			array('nombre' => 'Campeche (CAM)'),
			array('nombre' => 'Chiapas (CHIS)'),
			array('nombre' => 'Chihuahua (CHIH)'),
			array('nombre' => 'Coahuila (COAH)'),
			array('nombre' => 'Colima (COL)'),
			array('nombre' => 'Distrito Federal (DF)'),
			array('nombre' => 'Durango (DGO)'),
			array('nombre' => 'Guanajuato (GTO)'),
			array('nombre' => 'Guerrero (GRO)'),
			array('nombre' => 'Hidalgo (HGO)'),
			array('nombre' => 'Jalisco (JAL)'),
			array('nombre' => 'México - Estado de (EDM)'),
			array('nombre' => 'Michoacán (MICH)'),
			array('nombre' => 'Morelos (MOR)'),
			array('nombre' => 'Nayarit (NAY)'),
			array('nombre' => 'Nuevo León (NL)'),
			array('nombre' => 'Oaxaca (OAX)'),
			array('nombre' => 'Puebla (PUE)'),
			array('nombre' => 'Querétaro (QRO)'),
			array('nombre' => 'Quintana Roo (QROO)'),
			array('nombre' => 'San Luis Potosí (SLP)'),
			array('nombre' => 'Sinaloa (SIN)'),
			array('nombre' => 'Sonora (SON)'),
			array('nombre' => 'Tabasco (TAB)'),
			array('nombre' => 'Tamaulipas (TAMPS)'),
			array('nombre' => 'Tlaxcala (TLAX)'),
			array('nombre' => 'Veracruz (VER)'),
			array('nombre' => 'Yucatán (YUC)'),
			array('nombre' => 'Zacatecas (ZAC)'),
		);
		
        DB::table('estados')->insert($estados);
    }
 
}