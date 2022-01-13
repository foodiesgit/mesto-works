<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class MagazinePage extends Model
{
    use SoftDeletes;

    protected $fillable = ['magazine_id', 'magazine_draft_id', 'post_id', 'layer_image', 'title', 'description', 'content', 'image', 'order', 'created_by', 'deleted_by'];

    protected $table = 'magazine_pages';

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
    public function draft()
    {
        return $this->hasOne(MagazineDraft::class, 'id', 'magazine_draft_id');
    }
    public function magazine()
    {
        return $this->hasOne(Magazine::class, 'id', 'magazine_id');
    }
    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }

    public function transactions()
    {
        return $this->hasMany(MagazineTransaction::class, 'post_id', 'id');
    }

    public function scopeFiltering($query, $request)
    {
        if (isset($request->name)){
            $query->where('name', $request->name);
        }

        return $query;
    }
}