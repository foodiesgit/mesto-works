<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'created_by', 'updated_by'];

    protected $table = 'settings';

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
        /*static::updating(function ($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->updated_by = $user->id;
                $model->save();
            }
        });*/
    }

}