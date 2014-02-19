<?php

use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stores', function($table) {
	        $table->increments('id');
	        $table->string('name', 60);
	        $table->string('address', 80);
	        $table->float('lat', 10, 6);
			$table->float('lng', 10, 6);
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stores');
	}
}