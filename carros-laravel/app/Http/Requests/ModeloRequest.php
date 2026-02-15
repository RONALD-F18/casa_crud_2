<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeloRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');

        return [
            'nombre' => $isUpdate ? 'sometimes|required|string|max:255' : 'required|string|max:255',
            'marca' => $isUpdate ? 'sometimes|required|string|max:255' : 'required|string|max:255',
            'ano' => $isUpdate ? 'sometimes|required|integer|min:1886|max:' . (date('Y') + 1) : 'required|integer|min:1886|max:' . (date('Y') + 1),
            'descripcion' => $isUpdate ? 'sometimes|nullable|string' : 'nullable|string',
        ];

    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del modelo es obligatorio.',
            'marca.required' => 'La marca del modelo es obligatoria.',
            'ano.required' => 'El año del modelo es obligatorio.',
            'ano.integer' => 'El año del modelo debe ser un número entero.',
            'ano.min' => 'El año del modelo no puede ser anterior a 1886.',
            'ano.max' => 'El año del modelo no puede ser posterior al próximo año.',
        ];
    }
}
