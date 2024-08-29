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
            'user_id'=>1,
            'name'=>fake()->word(),
            'type'=>fake()->word(),
            'price'=>fake()->randomFloat(1,2,100),
            'description'=>fake()->paragraph(),
            'image'=>'products/apple.jpg',
        ];
    }
}
