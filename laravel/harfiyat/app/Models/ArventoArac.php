<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArventoArac extends Model
{
    protected $table = 'ArventoArac';

    protected $fillable = ['Plaka', 'AracTakipId'];

    public $timestamps = false;

}
