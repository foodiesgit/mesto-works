<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Scopes\CreatedByScope;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['status_id', 'title', 'description', 'content', 'image', 'published_at', 'show_index', 'show_header', 'show_footer', 'slug', 'created_by', 'deleted_by'];

    protected $table = 'posts';

    protected $dates = ['published_at'];

    public static function boot()
    {
        parent::boot();

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role->slug == 'author') {
                static::addGlobalScope(new CreatedByScope);
            }
        }

        static::creating(function ($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->created_by = $user->id;
            }
            $model->slug = Str::slug($model->title, '-');
        });
        static::updating(function ($model)
        {
            $model->slug = Str::slug($model->title, '-');
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

    public function categories()
    {
        return $this->hasMany(PostCategory::class, 'post_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(PostImage::class, 'post_id', 'id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id', 'id');
    }
    public function transactions()
    {
        return $this->hasMany(PostTransaction::class, 'post_id', 'id');
    }

    public function scopeShowIndex($query)
    {
        $query->where('show_index', 1);
    }
    public function scopeShowHeader($query)
    {
        $query->where('show_header', 1);
    }
    public function scopeShowFooter($query)
    {
        $query->where('show_footer', 1);
    }
    public function scopePublished($query)
    {
        $query->where('status_id', 3);
    }
    public function scopeFiltering($query, $request)
    {
        if (isset($request->category_id)){
            $query->where('category_id', $request->category_id);
        }

        return $query;
    }
}
