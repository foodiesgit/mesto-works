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
            'subject'=> 'required',
            'level'=> 'required',
            'line'=> 'required',
            'image' => 'image|nullable|max:2048|mimes:jpg,jpeg,png',
            'A'=> 'required',
            'B'=> 'required',
            'C'=> 'required',
            'D'=> 'required',
            'correct_answer'=> 'required'
        ];
    }
    // public function attributes()
    // {
    //     return [
    //         'question'=>'Soru',
    //         'subject'=> 'Konu',
    //         'level'=> 'Seviye',
    //         'line'=> 'Sıra',
    //         'A'=> 'Cevap A',
    //         'B'=> 'Cevap B',
    //         'C'=> 'Cevap C',
    //         'D'=> 'Cevap D',
    //         'correct_answer'=> 'Doğru Cevap'
    //     ];
    // }
}
