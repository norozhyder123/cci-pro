<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	User::insert([
    		[
	            'first_name' => 'Mark',
	            'last_name' => 'Angel',
	            'email' => 'mark@gmail.com',
	            'phone' => '0123456789',
	            'password' => Hash::make('12345678'),
	            'profile_img' => 'profiles/Mark1655748631.png',
	            'status' => 'active',
	        ],
	        [
	            'first_name' => 'Simons',
	            'last_name' => 'Daniel',
	            'email' => 'simon@gmail.com',
	            'phone' => '0258963147',
	            'password' => Hash::make('12345678'),
	            'profile_img' => 'profiles/Simons1655744518.png',
	            'status' => 'active',
	        ],
	        [
	            'first_name' => 'Noroz',
	            'last_name' => 'Hyder',
	            'email' => 'noroz@gmail.com',
	            'phone' => '0123456987235',
	            'password' => Hash::make('12345678'),
	            'profile_img' => 'profiles/Noroz1656021395.png',
	            'status' => 'active',
	        ],

    	]);
        //
    }
}
