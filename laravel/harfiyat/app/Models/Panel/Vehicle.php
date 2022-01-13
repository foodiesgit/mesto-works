<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = "KabulBelgesiArac";
    // protected $primaryKey = 'IlceKodu';
    public $timestamps = false;
}
