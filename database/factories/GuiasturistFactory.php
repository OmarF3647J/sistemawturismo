<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\guiasturist>
 */
class GuiasturistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomguiatur' => $this->faker->name(),
            'nomresguiatur' => $this->faker->name(),
            'telguiatur' => $this->faker->numerify('##########'),
            'corguiatur' => $this->faker->unique()->safeEmail(),
        ];
    }
}
