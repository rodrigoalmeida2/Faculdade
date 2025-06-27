<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\matricula;
use App\Models\Aluno;
use App\Models\Disciplina;

class MatriculaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'aluno_id' => Aluno::inRandomOrder()->first()->id ?? Aluno::factory(),
            'disciplina_id' => Disciplina::inRandomOrder()->first()->id ?? Disciplina::factory(),
            'ano' => now()->year,
            'semestre' => fake()->randomElement([1, 2]),
            'nota' => fake()->randomFloat(1, 0, 10),
            'frequencia' => fake()->numberBetween(50, 100),
        ];
    }
}
