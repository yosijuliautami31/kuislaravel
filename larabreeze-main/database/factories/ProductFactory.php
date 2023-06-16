<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
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
        $faker = $this->faker;

        return [
            'name' => $faker->colorName(),
            'price' => $faker->randomFloat(2000, 2000, 100000),
            'stock' => $faker->numberBetween(0, 100),
            'description' => $faker->sentence(),
        ];
    }
}
