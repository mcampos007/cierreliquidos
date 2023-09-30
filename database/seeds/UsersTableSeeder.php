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
        //
        User::create([
            'name' => 'mario',
            'email'=> 'mario@gmail.com',
            'password' => bcrypt('123123'),
           // 'admin' => true,
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'playero',
            'email'=> 'playero@gmail.com',
            'password' => bcrypt('123123'),
           // 'admin' => true,
            'role' => 'user'
        ]);
    }
}
