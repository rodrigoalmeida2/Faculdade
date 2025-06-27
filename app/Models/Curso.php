<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome', 'codigo', 'duracao',
    ];

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class);
    }
}
