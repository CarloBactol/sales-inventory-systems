<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_id' =>  "Product114",
            'product_name' => 'Prod 1',
            'brand' => 'BrandA',
            'price' => 100,
            'model' => '20T21',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, voluptates!',
        ]);

        Product::create([
            'product_id' => "Product113",
            'product_name' => 'Prod 2',
            'brand' => 'BrandB',
            'price' => 120,
            'model' => '22T22',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, voluptates!',
        ]);
        Product::create([
            'product_id' => "Product112",
            'product_name' => 'Prod 3',
            'brand' => 'BrandC',
            'price' => 150,
            'model' => '22T33',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, voluptates!',
        ]);
    }
}
