<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CursoService;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Curso\IndexRequest;
use App\Http\Requests\Curso\StoreRequest;
use App\Http\Requests\Curso\UpdateRequest;

class CursoController extends Controller
{
    private $cursoService;

    public function __construct(CursoService $cursoService)
    {
        $this->cursoService = $cursoService;
    }

    public function index(IndexRequest $request)
    {
        $filters = $request->validated();
        return response()->json($this->cursoService->list($filters));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        return response()->json($this->cursoService->create($data), 201);
    }

    public function show($id)
    {
        Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:cursos,id',
        ], [
            'id.required' => 'O ID é obrigatório.',
            'id.integer' => 'O ID deve ser um número inteiro.',
            'id.exists' => 'O curso com esse ID não foi encontrado.',
        ])->validate();

        return response()->json($this->cursoService->get($id));
    }

    public function update(UpdateRequest $request, $id)
    {
        Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:cursos,id',
        ], [
            'id.required' => 'O ID é obrigatório.',
            'id.integer' => 'O ID deve ser um número inteiro.',
            'id.exists' => 'O curso com esse ID não foi encontrado.',
        ])->validate();

        $data = $request->all();
        return response()->json($this->cursoService->update($id, $data));
    }

    public function destroy($id)
    {
        Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:cursos,id',
        ], [
            'id.required' => 'O ID é obrigatório.',
            'id.integer' => 'O ID deve ser um número inteiro.',
            'id.exists' => 'O curso com esse ID não foi encontrado.',
        ])->validate();
        
        try {
            $this->cursoService->delete($id);
            return response()->json("Curso deletado", 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
        
        
    }
}
