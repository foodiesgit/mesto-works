<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = "KabulBelgesi";
    // protected $primaryKey = 'IlceKodu';
    protected $primaryKey = 'KabulBelgesiId';

    public $timestamps = false;
}
