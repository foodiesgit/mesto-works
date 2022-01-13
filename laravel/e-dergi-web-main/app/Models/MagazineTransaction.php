<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class MagazineTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = ['magazine_id', 'status_id', 'status_description', 'name', 'description', 'image', 'published_at', 'slug', 'created_by', 'deleted_by'];

    protected $table = 'magazine_transactions';

    protected $dates = ['published_at'];

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

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function deletedBy()
    {
        return $this->hasOne(User::class, 'id', 'deleted_by');
    }
    public function status()
    {
        return $this->hasOne(Situation::class, 'id', 'status_id');
    }

}