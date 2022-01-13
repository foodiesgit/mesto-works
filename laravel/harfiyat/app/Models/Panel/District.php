<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = "Ilce";
    // protected $primaryKey = 'IlceKodu';
    public $timestamps = false;
}
