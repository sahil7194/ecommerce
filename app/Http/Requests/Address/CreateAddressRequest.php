<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressRequest extends FormRequest
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
            "street"     => 'required|string|min:3',
            "city"       => 'required|string|min:3',
            "type"       => 'required|in:home,work',
            "state_id"   => 'required',
            "country_id" => 'required'
        ];
    }
}