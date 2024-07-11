<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Alumno;
use App\Models\Curso;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matricula>
 */
class MatriculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'alumno_id' => $this->faker->randomElement(Alumno::pluck('id')->toArray()),
           'curso_id' => $this->faker->randomElement(Curso::pluck('id')->toArray()),
        ];
    }
}
