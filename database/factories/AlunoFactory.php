<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;


class AlunoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'cpf' => fake()->unique()->numerify('###########'), // 11 digits
            'email' => fake()->unique()->safeEmail(),
            'data_nascimento' => fake()->date('Y-m-d', '-18 years'),
            'matricula' => fake()->unique()->numerify('20######')
        ];
    }
    // /**
    // * Gera um CPF fictício único no formato 123.456.789-01
    // */
    // private function generateCpf(): string
    // {
    //     $cpf = '';
    //     for ($i = 0; $i < 9; $i++) {
    //         $cpf .= mt_rand(0, 9);
    //     }

    //     // Cálculo dos dígitos verificadores
    //     $sum = 0;
    //     for ($i = 0; $i < 9; $i++) {
    //         $sum += (int) $cpf[$i] * (10 - $i);
    //     }
    //     $firstDigit = ($sum * 10) % 11 % 10;

    //     $cpf .= $firstDigit;
    //     $sum = 0;
    //     for ($i = 0; $i < 10; $i++) {
    //         $sum += (int) $cpf[$i] * (11 - $i);
    //     }
    //     $secondDigit = ($sum * 10) % 11 % 10;

    //     $cpf .= $secondDigit;

    //     // Formatar como 123.456.789-01
    //     return vsprintf('%s%s%s.%s%s%s.%s%s%s-%s%s', str_split($cpf));
    // }
}
