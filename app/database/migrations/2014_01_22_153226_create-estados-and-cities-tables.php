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
			$table->foreign('id')->references('estados_id')->on('estados');
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