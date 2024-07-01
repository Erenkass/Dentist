<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;//izin veriyoruz
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tc' => 'required|digits:11|unique:patients,tc',
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'birthday' => 'required|date',
            'phone_number' => 'required|digits:11|unique:patients,phone_number',
        ];
    }

    public function messages(): array
    {
        return [
            'tc.required' => 'T.C. Alanı Zorunludur',
            'tc.digits' => 'T.C. Kimlik Numarası 11 haneli olmalıdır',
            'tc.unique' => 'Bu T.C. Kimlik Numarası zaten kayıtlı',
            'name.required' => 'İsim Alanı Zorunludur',
            'name.max' => 'İsim 50 karakterden uzun olamaz',
            'surname.required' => 'Soyisim Alanı Zorunludur',
            'surname.max' => 'Soyisim 50 karakterden uzun olamaz',
            'birthday.required' => 'Tarih Alanı Zorunludur',
            'birthday.date' => 'Geçerli bir tarih giriniz',
            'phone_number.required' => 'Telefon Alanı Zorunludur',
            'phone_number.digits' => 'Telefon Numarası 11 haneli olmalıdır',
            'phone_number.unique' => 'Bu Telefon Numarası zaten kayıtlı',
        ];
    }

}
