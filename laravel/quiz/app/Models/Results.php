<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'quizes_id',
        'score',
        'correct_count',
        'wrong_count'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
