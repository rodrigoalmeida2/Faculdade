<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aluno;

class AlunoSeeder extends Seeder
{
    public function run(): void
    {
        Aluno::factory()->count(20)->create();
    }
}
