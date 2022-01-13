<?php

namespace App\Http\Requests;

class StartVehicleMovementRequest extends Request
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
            'AracHareketId' => 'required|exists:AracHareket,AracHareketId',
            'Rota' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'AracHareketId.exists' => 'Bu AracHareketId bulunamadı.',
            'AracHareketId.required' => 'AracHareketId zorunludur.',
            'Rota.required' => 'Rota zorunludur.',
        ];
    }
}