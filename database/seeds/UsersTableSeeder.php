<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
			'name' => 'Luis Jimenez',
			'email' => 'luenjimo@hotmail.com',
			'password' => bcrypt('S00michoi'), // password
			'dni' => '15171493',
			'address' => '',
			'phone' => '',
			'role' => 'admin'
    	]);
        factory(User::class, 50)->create();
   	}
}
