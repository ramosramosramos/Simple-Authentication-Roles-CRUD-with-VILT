<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name'=>fake()->words(),
            'type'=>fake()->creditCardType(),
            'price'=>fake()->randomFloat(1,2,100),
            'description'=>fake()->paragraph(),
            'image'=>'null',
        ];
    }
}
