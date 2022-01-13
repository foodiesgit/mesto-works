<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

abstract class Request extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     *
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
    	throw new \Illuminate\Validation\ValidationException($validator, response()->json(array('data' => null, 'status' => false, 'success_messages' => null, 'error_messages' => $validator->errors()->all()), 400));
    }

}