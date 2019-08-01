<?php

use Illuminate\Database\Seeder;
use App\User;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('password');
        User::create(['name' => 'Administrator', 'username' => 'admin', 'user_type' => 'admin', 'email' => 'badopiece.ph@gmail.com', 'provider_name' => null, 'provider_id' => null, 'avatar' => null, 'password' => $password]);
    }
}
