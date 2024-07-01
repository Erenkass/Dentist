<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'phone_number' => 'required|digits:11|unique:users,phone_number',
        ];
    }
    public function messages(): array
    {
        return [
            'phone_number.required' => 'Telefon Alanı Zorunludur',
            'phone_number.digits' => 'Telefon Numarası 11 haneli olmalıdır',
            'phone_number.unique' => 'Bu Telefon Numarası zaten kayıtlı',
        ];
    }
}
