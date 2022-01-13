<?php

namespace App\Models\panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Current extends Model
{
    use HasFactory;
    protected $table = "CariHareket";
    // protected $primaryKey = 'IlKodu';
    public $timestamps = false;
}
