<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
        return [
            'update_name' => 'required|string|max:255|min:6',
            'update_description' => 'required|string|min:20',
            'update_preview' => 'required|string|max:255|min:10',
            'update_price' => 'required|numeric',
            'update_category_id' => 'required|exists:categories,category_id',
        ];
    }

    public function messages ()
    {
        return [
            'update_name.required' => 'El campo nombre es obligatorio.',
            'update_name.string' => 'El campo nombre debe ser una cadena de texto.',
            'update_name.max' => 'El campo nombre no puede tener más de 255 caracteres.',
            'update_name.min' => 'El campo nombre debe tener al menos 6 caracteres.',
            
            'update_description.required' => 'El campo descripción es obligatoria.',
            'update_description.string' => 'El campo descripción debe ser una cadena de texto.',
            'update_description.min' => 'El campo descripción debe tener al menos 20 caracteres.',
            
            'update_preview.required' => 'El campo información de previsualización es obligatoria.',
            'update_preview.string' => 'El campo información de previsualización debe ser una cadena de texto.',
            'update_preview.max' => 'El campo información de previsualización no puede tener más de 255 caracteres.',
            'update_preview.min' => 'El campo información de previsualizacion debe tener al menos 10 caracteres.',
            
            'update_price.required' => 'El campo precio es obligatorio.',
            'update_price.numeric' => 'El campo precio debe ser un número.',
            
            'update_category_id.required' => 'La categoría es obligatoria.',
            'update_category_id.exists' => 'La categoría seleccionada no es válida.',
        ];
    }
}
