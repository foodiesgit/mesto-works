<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class D extends Model
{
    use HasFactory;
    protected $table = "KabulBelgesiOdeme";
    // protected $primaryKey = 'IlKodu';
    public $timestamps = false;
}
