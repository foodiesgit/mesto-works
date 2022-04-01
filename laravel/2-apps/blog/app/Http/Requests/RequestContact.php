<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestContact extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|regex:/(^\w)/u',
            'email' => 'required|regex:/([^ ]+)@([^ ]+)\.([a-z]{2,3})(\.[a-z]{2,3})?$/u',
            'phone' => 'required|regex:/(^[1-9]{3}[ -]?)(\d{3}[ -]?)(\d{4})$/u'
        ];
    }
}
