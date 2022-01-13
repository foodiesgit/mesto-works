<?php

namespace App\Http\Requests;

class ListVehicleMovementRequest extends Request
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
            'KabulBelgesiId' => 'required|exists:KabulBelgesi,KabulBelgesiId',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'KabulBelgesiId.exists' => 'Bu KabulBelgesiId bulunamadı.',
            'KabulBelgesiId.required' => 'KabulBelgesiId zorunludur.',
        ];
    }
}