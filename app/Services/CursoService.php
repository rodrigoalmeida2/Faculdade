<?php

namespace App\Services;

use App\Repositories\CursoRepository;

class CursoService
{
    private $curso;

    public function __construct(CursoRepository $curso)
    {
        $this->curso = $curso;
    }

    public function list(array $filters): mixed
    {
        return $this->curso->list($filters);
    }

    public function create(array $data): mixed
    {
        return $this->curso->create($data);
    }

    public function get(int $id): mixed
    {
        return $this->curso->get($id);
    }

    public function update(int $id, array $data): mixed
    {
        return $this->curso->update($id, $data);
    }

    public function delete(int $id): mixed
    {
        return $this->curso->delete($id);
    }
}