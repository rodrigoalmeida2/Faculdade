<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return response()->json($this->service->list($request->all()));
    }

    public function show(int $id)
    {
        Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:users,id',
        ], [
            'id.required' => 'O ID é obrigatório.',
            'id.integer' => 'O ID deve ser um número inteiro.',
            'id.exists' => 'O usuario com esse ID não foi encontrado.',
        ])->validate();
        return response()->json($this->service->get($id));
    }

    public function update(UpdateRequest $request, int $id)
    {
        Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:users,id',
        ], [
            'id.required' => 'O ID é obrigatório.',
            'id.integer' => 'O ID deve ser um número inteiro.',
            'id.exists' => 'O usuario com esse ID não foi encontrado.',
        ])->validate();

        $result = $request->validated();
        
        return response()->json($this->service->update($id, $result));
    }

    public function destroy(int $id)
    {
        Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:users,id',
        ], [
            'id.required' => 'O ID é obrigatório.',
            'id.integer' => 'O ID deve ser um número inteiro.',
            'id.exists' => 'O usuario com esse ID não foi encontrado.',
        ])->validate();
        return response()->json($this->service->delete($id));
    }
}
