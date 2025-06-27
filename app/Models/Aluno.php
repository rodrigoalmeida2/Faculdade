<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aluno extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome', 'email', 'cpf', 'data_nascimento', 'matricula',
    ];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'matriculas')
                    ->withPivot('ano', 'semestre', 'nota', 'frequencia')
                    ->withTimestamps();
    }
}
