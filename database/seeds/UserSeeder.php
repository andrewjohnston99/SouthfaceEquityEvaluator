<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insertOrIgnore([
            'name' => 'Julian',
            'email' => 'jstephens75@gatech.edu',
            'password' => Hash::make('0v3rth3r3')
        ]);
    }
}
