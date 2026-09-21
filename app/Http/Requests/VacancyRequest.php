<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'min:3', 'max:255'],
            'company'      => ['required', 'string', 'min:2', 'max:255'],
            'type'         => ['required', 'in:Estágio,CLT,PJ,Meio Período'],
            'requirements' => ['required', 'string', 'min:10', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'        => 'O nome da Vaga é obrigatório.',
            'company.required'      => 'O nome da Empresa contratante é obrigatório.',
            'type.required'         => 'O tipo da Vaga é obrigatório.',
            'type'                  => 'Tipo de Vaga inválido.', 
            'requirements.required' => 'A descrição e requisitos da Vaga são obrigatórios.',
        ];
    }
}
