<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleNotification extends Model
{
    protected $table = 'AracUyari';
    public $timestamps = false;

    public function getKeyName(){
        return "AracUyariId";
    }
}
