<?php

namespace App\Http\Requests;

class LoginRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'PlakaNo' => 'required|exists:Arac,PlakaNo',
            'Sifre' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'PlakaNo.exists' => 'Bu Plaka No kayıtlı değildir.',
            'PlakaNo.required' => 'Plaka No zorunludur.',
            'Sifre.required' => 'Şifre zorunludur.',
        ];
    }
}