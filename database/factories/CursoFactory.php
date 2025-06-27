<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->words(3, true),
            'codigo' => strtoupper(Str::random(6)),
            'duracao' => fake()->numberBetween(4, 10),
        ];
    }
}
