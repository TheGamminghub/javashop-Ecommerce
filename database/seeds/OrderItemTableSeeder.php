<?php

use App\OrderItem;
use Illuminate\Database\Seeder;

class OrderItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderItem::create([
            'order_id' => 3,
            'product_id' => 4,
            'quantity' => 1,
            'price' => 4000,
        ]);

        OrderItem::create([
            'order_id' => 4,
            'product_id' => 1,
            'quantity' => 1,
            'price' => 16000,
        ]);

        OrderItem::create([
            'order_id' => 4,
            'product_id' => 3,
            'quantity' => 1,
            'price' => 50000,
        ]);
    }
}
