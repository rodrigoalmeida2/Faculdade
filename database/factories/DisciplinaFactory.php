<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Curso;
use App\Models\Disciplina;

class DisciplinaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->words(2, true),
            'codigo' => strtoupper(fake()->unique()->bothify('DISC###')),
            'carga_horaria' => fake()->randomElement([30, 45, 60, 90]),
            'curso_id' => Curso::inRandomOrder()->first()->id ?? Curso::factory(),
        ];
    }
}
