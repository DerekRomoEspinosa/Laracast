<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 500),
            'image' => fake()->imageUrl(640, 480, 'products'),
            'brand_id' => Brand::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
