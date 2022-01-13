<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $table = "KabulBelgesiDosya";
    // protected $primaryKey = 'IlceKodu';
    public $timestamps = false;
}
