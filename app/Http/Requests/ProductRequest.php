<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:6',
            'description' => 'required|string|min:20',
            'preview' => 'required|string|max:255|min:10',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,category_id',
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ];
    }

    public function messages ()
    {
        return [
            'preview.required' => 'El campo información de previsualización es obligatoria.',
            'preview.string' => 'El campo información de previsualización debe ser una cadena de texto.',
            'preview.max' => 'El campo información de previsualización no puede tener más de 255 caracteres.',
            'preview.min' => 'El campo información de previsualizacion debe tener al menos 10 caracteres.',
        ];
    } 
}
