<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->randomNumber(8, false),
            'full_name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'address' => $this->faker->text(),
            'isActive' => true,
        ];
    }
}
