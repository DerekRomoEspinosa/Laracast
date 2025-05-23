<?php

namespace Database\Factories;
use App\Models\Developer;


use Illuminate\Database\Eloquent\Factories\Factory;
use function PHPUnit\Framework\returnSelf;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
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
            'title' => fake()->jobTitle(),
            'developer_id' => Developer::factory(),
            'description' => 'holahola'
        ];
    }
}
