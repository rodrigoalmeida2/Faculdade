<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disciplina extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome', 'codigo', 'carga_horaria', 'curso_id',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'matriculas')
                    ->withPivot('ano', 'semestre', 'nota', 'frequencia')
                    ->withTimestamps();
    }
}
