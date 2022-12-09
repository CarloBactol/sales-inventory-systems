<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create(['name' => 'BRAND A']);
        Brand::create(['name' => 'BRAND B']);
        Brand::create(['name' => 'BRAND C']);
        Brand::create(['name' => 'BRAND D']);
        Brand::create(['name' => 'BRAND E']);
    }
}
