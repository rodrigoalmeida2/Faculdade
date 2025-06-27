<?php

namespace App\Http\Requests\Aluno;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:alunos,email'],
            'cpf' => ['required', 'string', 'size:11', 'unique:alunos,cpf'],
            'data_nascimento' => ['required', 'date_format:Y-m-d'],
        ];
    }
}
