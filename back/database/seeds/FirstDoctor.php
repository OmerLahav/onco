<?php

use App\User;
use Illuminate\Database\Seeder;

class FirstDoctor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Dr. Jones',
        	'email' => 'jones@hospital.com',
        	'password' => bcrypt('123456'),
        	'role' => 1
        ]);
    }
}
