<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'image',
        'subject',
        'level',
        'line',
        'A',
        'B',
        'C',
        'D',
        'correct_answer'
    ];

    protected $appends = ['truePercent'];

    public function getTruePercentAttribute()
    {
        $answersCount = $this->answers()->count();
        $answersTrue = $this->answers()->where('answers', $this->correct_answer)->count();
        return (100 / $answersCount) * $answersTrue;
    }

    public function answers()
    {
        return $this->hasMany(Answers::class, 'question_id');
    }

    public function userAnswers()
    {
        return $this->hasOne(Answers::class, 'question_id')->where('user_id', auth()->user()->id);
    }
}
