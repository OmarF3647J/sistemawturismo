<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\centrosturist>
 */
class CentrosturistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomcentur' => $this->faker->company(),
            'dircentur' => $this->faker->address(),
            'descentur' => $this->faker->paragraph(3),
            'rescentur' => $this->faker->name(),
            'telcentur' => $this->faker->numerify('##########'),
            'corcentur' => $this->faker->unique()->safeEmail(),
            'idproduct' => $this->faker->numberBetween(1, 2), #productos entre el ID 1 y 2, sino existen esos ID va a marcar error
        ];
    }
}
