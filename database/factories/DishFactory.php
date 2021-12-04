<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'description' => $this->faker->paragraph(7),
            'price' => $this->faker->randomFloat(2, $min = 100, $max = 10000),
            'image' => $this->faker->imageUrl($width = 400, $height = 300),
        ];
    }
}
