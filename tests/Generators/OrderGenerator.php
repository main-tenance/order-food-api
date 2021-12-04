<?php

namespace Tests\Generators;

use App\Models\Company;
use App\Models\Dish;
use App\Models\Order;
use App\Models\OrderLine;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Foundation\Testing\WithFaker;

class OrderGenerator
{
    public static function getData()
    {
        $faker = Container::getInstance()->make(Generator::class);
        CompaniesCategoriesGenerator::create(2, 3);
        $dishes = Dish::factory(3)->create();
        $lines = [];
        foreach ($dishes as $dish) {
            $line = [
                'dish_id' => $dish->id,
                'quantity' => rand(1, 3),
            ];
            $lines[] = $line;
        }
        return [
            'company_id' => Company::inRandomOrder()->first()->id,
            'client_name' => $faker->name(),
            'client_phone' => $faker->regexify('09[0-9]{9}'),
            'lines' => $lines,
        ];
    }

    public static function create(int $cnt = 1, array $data = []): void
    {
        Order::factory($cnt)->create();
        Dish::factory(5)->create();
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
