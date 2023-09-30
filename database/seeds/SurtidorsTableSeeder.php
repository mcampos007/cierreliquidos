<?php

use Illuminate\Database\Seeder;
use App\Surtidor;

class SurtidorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productIds = [1, 2, 3, 4];
        
        for ($i = 1; $i <= 36; $i++) {
            Surtidor::create([
                'name' => 'Surtidor ' . $i,
                'product_id' => $productIds[array_rand($productIds)],
            ]);
        }
    }
}
