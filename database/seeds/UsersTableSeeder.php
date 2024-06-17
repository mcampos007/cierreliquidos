<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        //
        User::create( [
            'name' => 'mario',
            'email'=> 'mcampos.infocam@gmail.com',
            'password' => bcrypt( 'Cc2024Inf' ),
            // 'admin' => true,
            'role' => 'admin'
        ] );
        User::create( [
            'name' => 'cesar',
            'email'=> 'cesar.campos@infocam.com.ar',
            'password' => bcrypt( 'Cc2024Inf' ),
            // 'admin' => true,
            'role' => 'admin'
        ] );
        User::create( [
            'name' => 'playero',
            'email'=> 'playero@gmail.com',
            'password' => bcrypt( '1234qwer' ),
            // 'admin' => true,
            'role' => 'user'
        ] );
    }
}
