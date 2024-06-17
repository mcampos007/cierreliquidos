<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        //
        DB::table( 'products' )->insert( [
            [
                'name' => 'Nafta Infinia',
                'price' => 1216,
            ],
            [
                'name' => 'Nafta Super',
                'price' => 1010,
            ],
            [
                'name' => 'Infinia diesel',
                'price' => 1277,
            ],
            [
                'name' => 'D 500',
                'price' => 1079,
            ],
            // Agrega más registros si lo deseas
        ] );
    }
}
