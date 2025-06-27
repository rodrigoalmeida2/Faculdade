<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Aluno\IndexRequest;
use App\Http\Requests\Aluno\StoreRequest;
use App\Http\Requests\Aluno\UpdateRequest;
use App\Services\AlunoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{
    protected AlunoService $service;

    public function __construct(AlunoService $service)
    {
        $this->service = $service;
    }

    public function index(IndexRequest $request): JsonResponse
    {
        $validated = $request->validated();
        return response()->json($this->service->list($validated));
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $validated = $request->validated();
        return response()->json($this->service->create($validated), 201);
    }

    public function show(int $id): JsonResponse
    {
        Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:alunos,id',
        ], [
            'id.required' => 'O ID é obrigatório.',
            'id.integer' => 'O ID deve ser um número inteiro.',
            'id.exists' => 'O aluno com esse ID não foi encontrado.',
        ])->validate();
        
        return response()->json($this->service->get($id));
    }

    public function update(UpdateRequest $request, int $id): JsonResponse
    {
        return response()->json($this->service->update($id, $request->validated()));
    }

    public function destroy(int $id)
    {
        Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:alunos,id',
        ], [
            'id.required' => 'O ID é obrigatório.',
            'id.integer' => 'O ID deve ser um número inteiro.',
            'id.exists' => 'O aluno com esse ID não foi encontrado.',
        ])->validate();

        $this->service->delete($id);
        return response()->json(['Usuário Deletado', 204]);
    }
}
