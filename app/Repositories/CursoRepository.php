<?php 

namespace App\Repositories;

use App\Models\Curso;

class CursoRepository
{
    protected $curso;

    public function __construct(Curso $curso)
    {
        $this->curso = $curso;
    }

    public function list(array $filters): mixed
    {
        $busca = $filters['busca'] ?? null;

        $cursos = Curso::select('id', 'nome', 'codigo', 'duracao', 'created_at')
        ->when($busca, function ($query) use ($busca){
            $query->where('nome', 'LIKE', "%{$busca}%")
            ->orWhere('duracao', 'LIKE', "%{$busca}%")
            ->orWhere('codigo', 'LIKE', "%{$busca}%");
        });
        return $cursos->orderBy('id', 'DESC')->get();
    }

    public function create(array $data): mixed
    {
        return Curso::create($data);
    }

    public function get(int $id): mixed
    {
        return Curso::find($id);
    }

    public function update(int $id, array $data): mixed
    {
        $curso = Curso::find($id);
        $curso->update($data);
        return $curso;
    }

    public function delete(int $id): mixed
    {
        try {
            $curso = Curso::findOrFail($id);
            $curso->delete();
            return true;
        } catch (\Exception $e) {
            return false; // Retorna false se o curso não for encontrado
        }

    }
}