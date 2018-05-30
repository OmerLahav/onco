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
            'first_name' => 'System',
        	'last_name' => 'Admin',
        	'email' => 'SysAdmin@ican.co.il',
        	'password' => bcrypt('123456'),
        	'role' => 5,
            'identification_number' => '1234567890',
            'phone' => '972501234567'
        ]);
    }
}
