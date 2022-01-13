<?php

namespace App\Http\Requests;

class StoreVehicleMovementRequest extends Request
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
            //'AracId' => 'required|exists:Arac,AracId',
            'KabulBelgesiId' => 'required|exists:KabulBelgesi,KabulBelgesiId',
            'DurumId' => 'exists:Durum,DurumId',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            //'AracId.exists' => 'Bu Araç kayıtlı değildir.',
            //'AracId.required' => 'AracId zorunludur.',
            'KabulBelgesiId.exists' => 'Bu KabulBelgesiId bulunamadı.',
            'KabulBelgesiId.required' => 'KabulBelgesiId zorunludur.',
            'DurumId.exists' => 'Bu DurumId bulunamadı.',
        ];
    }
}