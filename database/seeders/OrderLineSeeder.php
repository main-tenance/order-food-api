<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Database\Seeder;

class OrderLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Order::all() as $order) {
            $dishes = Dish::inRandomOrder()->limit(rand(1, 5))->get();
            foreach ($dishes as $dish) {
                OrderLine::create([
                    'order_id' => $order->id,
                    'dish_id' => $dish->id,
                    'quantity' => rand(1, 3),
                    'price' => $dish->price,
                ]);
            }
            $order->sum = $dishes->pluck('price')->sum();
            $order->save();
        }
    }
}
