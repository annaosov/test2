<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->realText(rand(11, 20));
        return [
            'name' => $name,
            'description' => $this->faker->realText(rand(70, 140)),
            'price' => rand(100, 2000000),
            'quantity_in_stock' => rand(100, 2000000),
        ];
    }
}

