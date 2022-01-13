<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['top_id', 'name', 'image', 'class_name', 'hex_color_code', 'is_active', 'show_index', 'show_header', 'show_footer', 'order', 'slug', 'created_by', 'deleted_by'];

    protected $table = 'categories';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->created_by = $user->id;
            }
            $model->slug = Str::slug($model->name, '-');
        });
        static::updating(function ($model)
        {
            $model->slug = Str::slug($model->name, '-');
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

    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }
    public function scopePassive($query)
    {
        $query->where('is_active', 0);
    }
    public function scopeTops($query)
    {
        $query->where('top_id', 0)->orWhereNull('top_id');
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

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function deletedBy()
    {
        return $this->hasOne(User::class, 'id', 'deleted_by');
    }
    public function top()
    {
        return $this->hasOne(Category::class, 'id', 'top_id');
    }

    public function subs()
    {
        return $this->hasMany(Category::class, 'top_id', 'id');
    }
    public function posts()
    {
        return $this->hasMany(PostCategory::class, 'category_id', 'id');
    }


    public function scopeFiltering($query, $request)
    {
        if (isset($request->top_id)){
            $query->where('top_id', $request->top_id);
        }

        return $query;
    }
}