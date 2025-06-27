<?php

namespace App\Http\Requests\Curso;

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
            'codigo' => ['required', 'min:8', 'max:8', 'unique:cursos,codigo'],
            'duracao' => ['required', 'int', 'min:30', 'max:120'],
        ];
    }
}
