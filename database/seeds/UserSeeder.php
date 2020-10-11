<?php

use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');
    	for($i=1; $i<=50; $i++)
    	{
    		User::create([
    			'name' => $faker->name,
    			'email' => $faker->email,
    			'password' => bcrypt('zoncertpwd'),
    			'status' => 2,
    			'avatar' => 'user.png',
    		]);
    	}
    }
}
