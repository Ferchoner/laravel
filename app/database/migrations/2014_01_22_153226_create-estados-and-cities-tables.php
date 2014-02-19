<?php

use Illuminate\Database\Migrations\Migration;

class CreateEstadosAndCitiesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estados', function($table) {
	        $table->increments('id');
	        $table->string('nombre', 30);
	    });
		
		Schema::create('ciudades', function($table) {
	        $table->increments('id');
	        $table->string('nombre', 30);
			$table->int('estados_id', 4);
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estados');
		Schema::drop('ciudades');
	}

}