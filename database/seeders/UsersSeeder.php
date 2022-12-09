<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>  bcrypt('adminuser'),
            'role_as' => '1'
        ]);
        User::create([
            'name' => 'cashier',
            'email' => 'cashier@gmail.com',
            'password' =>  bcrypt('cashieruser'),
            'role_as' => '2'
        ]);
        User::create([
            'name' => 'client',
            'email' => 'client@gmail.com',
            'password' =>  bcrypt('clientuser'),
            'role_as' => '3'
        ]);
    }
}
