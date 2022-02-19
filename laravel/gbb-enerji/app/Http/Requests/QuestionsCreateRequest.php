<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question'=>'required|min:5',
            'A'=> 'required',
            'B'=> 'required',
            'correct_answer'=> 'required'
        ];
    }
    public function attributes()
    {
        return [
            'question'=>'Soru',
            'A'=> 'Cevap A',
            'B'=> 'Cevap B',
            'correct_answer'=> 'Doğru Cevap'
        ];
    }
}
