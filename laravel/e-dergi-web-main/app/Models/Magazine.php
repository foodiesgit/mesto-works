<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Magazine extends Model
{
    use SoftDeletes;

    protected $fillable = ['status_id', 'name', 'description', 'image', 'published_at', 'slug', 'created_by', 'deleted_by'];

    protected $table = 'magazines';

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

    public function likes()
    {
        return $this->hasMany(Like::class, 'magazine_id', 'id');
    }
    public function pages()
    {
        return $this->hasMany(MagazinePage::class, 'magazine_id', 'id');
    }
    public function transactions()
    {
        return $this->hasMany(MagazineTransaction::class, 'magazine_id', 'id');
    }

    public function scopePublished($query)
    {
        $query->where('status_id', 7);
    }
    public function scopeFiltering($query, $request)
    {
        if (isset($request->name)){
            $query->where('name', $request->name);
        }

        return $query;
    }
}