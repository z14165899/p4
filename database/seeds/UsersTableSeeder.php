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
        $user = User::firstOrCreate([
        'email' => 'chen@harvard.edu',
        'name' => 'Chen Zhao',
        'password' => Hash::make('helloworld')
    	]);

    	$user = User::firstOrCreate([
        'email' => 'susan@harvard.edu',
        'name' => 'Susan Buck',
        'password' => Hash::make('helloworld')
    	]);
    }
}
