<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            foreach (range(1, 5) as $i) {
                MenuItem::create([
                    'restaurant_id' => $restaurant->id,
                    'name' => 'Item ' . $i . ' - ' . $restaurant->name,
                    'description' => 'Delicious item ' . $i,
                    'price' => rand(500, 2000) / 100, // e.g., 5.00 to 20.00
                ]);
            }
        }
    }
}
