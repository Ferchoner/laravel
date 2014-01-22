<?php

class UserTableSeeder extends Seeder {
 
    public function run()
    {
        $users = array(
            array('nick' => 'Juan', 'password' => Hash::make('111'), 'email' => 'juan@email.com'),
            array('nick' => 'Pedro', 'password' => Hash::make('222'), 'email' => 'pedro@email.com'),
            array('nick' => 'Diego', 'password' => Hash::make('333'), 'email' => 'diego@email.com'),
		);
		 
        DB::table('users')->insert($users);
    }
 
}