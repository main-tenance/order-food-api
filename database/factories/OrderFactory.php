<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::inRandomOrder()->first()->id,
            'sum' => 0,
            'client_name' => $this->faker->name(),
            'client_phone' => $this->faker->regexify('09[0-9]{9}'),
        ];
    }
}
