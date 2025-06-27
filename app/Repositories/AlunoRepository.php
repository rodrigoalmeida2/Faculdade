<?php

namespace App\Repositories;

use App\Models\Aluno;
use Carbon\Carbon;

class AlunoRepository
{
    protected $model;

    public function __construct(Aluno $aluno)
    {
        $this->model = $aluno;
    }

    // Lista todos os alunos com filtros opcionais
    public function list(array $filters): mixed
    {
        $busca = $filters['busca'] ?? null;

        $result = Aluno::select('id', 'nome', 'email', 'data_nascimento', 'matricula')
            ->when(!empty($busca), function ($query) use ($busca) {
                $query->where('nome', 'LIKE', "%{$busca}%")
                ->orWhere('email', 'LIKE', "%{$busca}%")
                ->orWhere('matricula', 'LIKE', "%{$busca}%");
            })
            ->orderBy('id', 'DESC');
        return $result->get();
    }

    // Cria um novo aluno e gera a matrícula
    public function create(array $data): mixed
    {
        $aluno = Aluno::create($data);

        $aluno->matricula = $this->gerarMatricula($aluno->id);
        $aluno->save();
        return $aluno;
    }

    // Obtém um aluno específico pelo ID
    public function get(int $id): mixed
    {
        return Aluno::find($id);
    }

    public function update(int $id, array $data): mixed
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->update($data);
        return $aluno;
    }

    // Deleta um aluno pelo ID
    // Utiliza soft delete, então o registro não é removido do banco, mas marcado como deletado
    public function delete(int $id): void
    {
        Aluno::findOrFail($id)->delete();
    }

    // Gera a matrícula no formato "AAAA0000001"
    public function gerarMatricula(int $alunoId): string
    {
        $anoAtual = now()->year;
        $quantidade = Aluno::whereYear('created_at', $anoAtual)->count() + 1;

        return sprintf('%d%04d', $anoAtual, $quantidade);
    }
}