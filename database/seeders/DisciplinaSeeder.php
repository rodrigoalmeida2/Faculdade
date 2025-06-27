<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disciplina;


class DisciplinaSeeder extends Seeder
{
    public function run(): void
    {
        Disciplina::factory()->count(15)->create();
    }
}
