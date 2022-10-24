<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
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
    public function definition()
    {
       $category = Category::first();
        return [
            'category_id' => $category -> id,
            'title' => fake()->unique()->word(2),
            'description' => fake()->word(50),
            'short_description' => fake()->word(10),
            'SKU' => fake()->unique()->randomNumber(5, true),
            'price' => fake()->randomFloat(1, 100, 800),
            'discount' => fake()->randomDigitNot(0),
            'in_stock' => fake()->randomNumber(3, false),
            'thumbnail' =>fake () -> image(null, 640, 480),

        ];
    }
}
