<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'=>'required',
            'phone'=>'required',
            'branch1'=>'required',
            'branch2'=>'required',
            'map'=>'required'
        ];
    }
}
