<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    use HasFactory;
    protected $table = "Mahalle";
    // protected $primaryKey = 'IlceKodu';
    public $timestamps = false;
}
