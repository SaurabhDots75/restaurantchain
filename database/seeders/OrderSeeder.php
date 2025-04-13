<?php

namespace Database\Seeders;

use App\Events\TestPusherEvent;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = Restaurant::all();
        $customers = User::role('Customers')->get();
        
        foreach ($restaurants as $restaurant) {
            foreach (range(1, 10) as $i) {
                $customer = $customers->random();
        
                   $order =    Order::create([
                    'restaurant_id'    => $restaurant->id,
                    'user_id'          => $customer->id,
                    'total_price'      => rand(1000, 5000) / 100,
                    'wallet_redeemed'  => rand(0, 500) / 100,
                    'status'           => collect(['pending', 'preparing', 'completed', 'cancelled'])->random(),
                    'order_type'       => collect(['dine-in', 'delivery', 'pickup'])->random(),
                    'source'           => collect(['manual', 'qr', 'opentable', 'deliveroo'])->random(),
                    'table_number'     => rand(1, 20),
                    'notes'            => fake()->optional()->sentence(),
                    'delivery_address' => fake()->optional()->address(),
                    'created_at'       => now()->subDays(rand(0, 7)),
                    'updated_at'       => now(),
                ]);
                TestPusherEvent::dispatch($order);
            }
        }


    }
}
