<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'orderData.buyerUuid' => 'required|string',
            'orderData.email' => 'required|email|indisposable',
            'orderData.name' => 'required|string',
            'orderData.surname' => 'required|string',
            'orderData.telephone' => 'required|string',
            'orderData.parsedCart' => 'required|array',
            'orderData.parsedCart.*.product_id' => 'required|integer',
            'orderData.parsedCart.*.quantity' => 'required|integer',
            'orderData.parsedCart.*.price' => 'required|numeric',
        ];
    }
}
