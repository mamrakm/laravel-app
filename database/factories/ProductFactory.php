<?php

namespace Database\Factories;

use Carbon\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->text,
        ];
    }
}
