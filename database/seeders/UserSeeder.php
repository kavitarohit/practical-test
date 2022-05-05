<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
use Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
			'name' => 'kavita',
			'email' => 'admin@admin.com',
            'password' => bcrypt('password'), // Can also be used Hash::make('password@123')
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
   		]);
		
    }
}
