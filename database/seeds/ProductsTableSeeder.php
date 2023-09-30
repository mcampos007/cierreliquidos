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
                'price' => 258,
            ],
            [
                'name' => 'Nafta Super',
                'price' => 207.9,  
            ],
            [
                'name' => 'Infinia diesel',
                'price' => 299.10,
            ],
            [
                'name' => 'D 500',
                'price' => 222.7,  
            ],
            // Agrega más registros si lo deseas
        ]);
    }
}
