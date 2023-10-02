<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'Nafta Infinia',
                'price' => 352.9,
            ],
            [
                'name' => 'Nafta Super',
                'price' => 284.1,  
            ],
            [
                'name' => 'Infinia diesel',
                'price' => 390.3,
            ],
            [
                'name' => 'D 500',
                'price' => 304.1,  
            ],
            // Agrega más registros si lo deseas
        ]);
    }
}
