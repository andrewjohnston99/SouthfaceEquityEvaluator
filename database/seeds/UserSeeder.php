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
        $user = new User;

        $user->name = 'Julian';
        $user->email = 'jstephens75@gatech.edu';
        $user->password = Hash::make('0v3rth3r3');

        $user->save();
    }
}
