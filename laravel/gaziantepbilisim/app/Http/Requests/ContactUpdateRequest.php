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
            'email'=>'required|min:8|max:100',
            'phone'=>'required|min:10|max:11',
            'branch1'=>'required|min:10|max:255',
            'branch2'=>'required|min:10|max:255',
            'map'=>'required|min:50'
        ];
    }
}
