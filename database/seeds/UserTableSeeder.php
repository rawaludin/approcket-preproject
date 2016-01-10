<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'admin'
        ]);

        // sample customer
        User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'customer'
        ]);
    }
}
