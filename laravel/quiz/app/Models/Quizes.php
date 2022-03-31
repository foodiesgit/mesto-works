<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quizes extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'state',
        'finished_at'
    ];
    protected $dates = ['finished_at']; //for diffForHumans

    public function questions()
    {
        return $this->hasMany('App\Models\Questions');
    }

    protected $appends = ['details', 'rank'];

    public function getDetailsAttribute()
    {
        return [
            "avarage" => round($this->allResults()->avg('score')),
            "joinerCount" => $this->allResults()->count()
        ];
    }

    public function getRankAttribute()
    {
        $rank = 0;
        foreach ($this->allResults()->orderByDesc('score')->get() as $item) {
            $rank += 1;
            if (Auth::id() === $item->user_id) {
                return $rank;
            }
        }
    }

    public function allResults()
    {
        return $this->hasMany('App\Models\Results');
    }

    public function userResults()
    {
        return $this->hasOne('App\Models\Results')->where('user_id', auth()->user()->id);
    }

    public function topScore()
    {
        return $this->allResults()->orderByDesc('score')->limit(3);
    }
}
