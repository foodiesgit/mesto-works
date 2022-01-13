<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Situation extends Model
{
    use SoftDeletes;

    protected $fillable = ['type_id', 'name', 'image', 'class_name', 'hex_color_code', 'is_deletable', 'created_by', 'deleted_by'];

    protected $table = 'situations';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->created_by = $user->id;
            }
        });
        static::deleting(function ($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->deleted_by = $user->id;
                $model->save();
            }
        });
    }

    public function scopePost($query)
    {
        $query->where('type_id', 1);
    }
    public function scopeMagazine($query)
    {
        $query->where('type_id', 2);
    }

}