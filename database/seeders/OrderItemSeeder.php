<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $menuItems = MenuItem::all();

        foreach ($orders as $order) {
            // Each order gets 1–3 items
            foreach (range(1, rand(1, 3)) as $i) {
                $item = $menuItems->random();

                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_item_id' => $item->id,
                    'quantity' => rand(1, 5),
                    'price' => $item->price,
                ]);
            }
        }
    }
}
