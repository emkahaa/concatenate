<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CekOngkirRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'asal' => 'required|numeric',
            'tujuan' => 'required|numeric',
            'berat' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'asal' => 'Kota Asal',
            'tujuan' => 'Kota Tujuan',
            'berat' => 'Berat Kiriman',
        ];
    }
}
