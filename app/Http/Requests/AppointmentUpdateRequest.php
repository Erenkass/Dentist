<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentUpdateRequest extends FormRequest
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
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Tarih alanı zorunludur.',
            'date.date' => 'Geçerli bir tarih formatı giriniz.',
            'date.after_or_equal' => 'Tarih bugünden daha eski olamaz.',
            'time.required' => 'Saat alanı zorunludur.',
            'time.date_format' => 'Geçerli bir saat formatı giriniz (HH:MM).',
        ];
    }
}
