<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Mi Max 2',
            'price' => '16000',
            'description' => 'Mi max 2 64Gb ROM , 4Gb Ram',
            'image' => 'mi-max-2-smartphone-500x500.png',
        ]);

        Product::create([
            'name' => 'I Phone XR',
            'price' => '78000',
            'description' => '128 Gb Storage',
            'image' => 'iphone.jpg',
        ]);

        Product::create([
            'name' => 'Mac Book',
            'price' => '50000',
            'description' => 'Latest Mac Book',
            'image' => 'macbook.jpg',
        ]);

        Product::create([
            'name' => 'Dell Laptop',
            'price' => '4000',
            'description' => 'Dell Inspiration',
            'image' => 'dell.jpg',
        ]);
    }
}
