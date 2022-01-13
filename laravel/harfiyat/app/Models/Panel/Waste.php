<?php

namespace App\Models\Panel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;
    protected $table = "AtikCinsi";
    // protected $primaryKey = 'IlceKodu';
    public $timestamps = false;
}
