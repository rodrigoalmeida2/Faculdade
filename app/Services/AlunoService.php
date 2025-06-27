<?php

namespace App\Services;

use App\Repositories\AlunoRepository;

class AlunoService
{
    protected $aluno;

    public function __construct(AlunoRepository $aluno)
    {
        $this->aluno = $aluno;
    }

    public function list(array $filters):mixed
    {
        return $this->aluno->list($filters);
    }

    public function create(array $data): mixed
    {
        return $this->aluno->create($data);
    }

    public function get(int $id): mixed
    {
        return $this->aluno->get($id);
    }

    public function update(int $id, array $data): mixed
    {
        return $this->aluno->update($id, $data);
    }

    public function delete(int $id): void
    {
        $this->aluno->delete($id);
    }
}