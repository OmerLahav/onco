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
            'first_name' => 'Dr.',
        	'last_name' => 'Jones',
        	'email' => 'jones@hospital.com',
        	'password' => bcrypt('123456'),
        	'role' => 1,
            'identification_number' => '1234567890',
            'phone' => '0501234567'
        ]);
    }
}
