<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CarroRequest extends FormRequest
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
            'color' => $isUpdate ? 'sometimes|required|string|max:255' : 'required|string|max:255',
            'modelo_id' => $isUpdate ? 'sometimes|required|exists:modelos,id' : 'required|exists:modelos,id',
            'descripcion' => $isUpdate ? 'sometimes|nullable|string' : 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'color.required' => 'El color del carro es obligatorio.',
            'modelo_id.required' => 'El modelo del carro es obligatorio.',
            'modelo_id.exists' => 'El modelo seleccionado no existe.',
        ];
    }
}
