<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['post_id', 'magazine_id', 'ip', 'user_agent', 'is_like'];

    protected $table = 'likes';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            $model->ip = request()->ip();
            $model->user_agent = request()->userAgent();
        });
    }

}