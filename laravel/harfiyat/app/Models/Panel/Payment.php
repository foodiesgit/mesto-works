<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = "KabulBelgesiOdeme";
    // protected $primaryKey = 'IlceKodu';
    public $timestamps = false;
}
