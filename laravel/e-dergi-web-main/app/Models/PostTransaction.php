<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class PostTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = ['post_id', 'status_id', 'title', 'description', 'content', 'image', 'status_description', 'created_by', 'deleted_by'];

    protected $table = 'post_transactions';

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
    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }
    public function status()
    {
        return $this->hasOne(Situation::class, 'id', 'status_id');
    }


    public function scopeFiltering($query, $request)
    {
        if (isset($request->status_id)){
            $query->where('status_id', $request->status_id);
        }

        return $query;
    }
}