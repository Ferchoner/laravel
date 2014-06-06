<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('StoresTableSeeder');
		$this->call('CiudadTableSeeder');
		$this->call('EstadoTableSeeder');
		$this->call('UserTableSeeder');
	}
}