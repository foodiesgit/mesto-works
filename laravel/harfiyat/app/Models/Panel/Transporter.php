<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporter extends Model
{
    use HasFactory;
    protected $table = "Firma";
    // protected $primaryKey = 'IlceKodu';
    public $timestamps = false;
}
