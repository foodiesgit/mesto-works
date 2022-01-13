<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MagazineDraft extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'image', 'is_active'];

    protected $table = 'magazine_drafts';



    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }
    public function scopePassive($query)
    {
        $query->where('is_active', 0);
    }
    public function scopeFiltering($query, $request)
    {
        if (isset($request->name)){
            $query->where('name', 'like', $request->name);
        }

        return $query;
    }
}