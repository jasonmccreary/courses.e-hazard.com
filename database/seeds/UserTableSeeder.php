<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'jason@pureconcepts.net',
            'password' => Hash::make('mccreaja'),
            'is_admin' => 1
        ]);

        User::create([
            'email' => 'jason@arcwear.com',
            'password' => Hash::make('taint'),
            'is_admin' => 1
        ]);
    }
}
