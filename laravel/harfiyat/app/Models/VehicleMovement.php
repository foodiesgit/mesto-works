<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VehicleMovement extends Model
{
    protected $table = 'AracHareket';

    protected $primaryKey = 'AracHareketId';

    public $timestamps = false;

    protected $fillable = ['KabulBelgesiId', 'AracId', 'IstekTarih', 'OnaylanmaTarihi', 'DokumTarihi', 'DepolamaAlanId', 'DurumId', 'Rota'];


    public function warehouse()
    {
        return $this->hasOne(Warehouse::class, 'DepolamaAlanId', 'DepolamaAlanId');
    }
    public function status()
    {
        return $this->hasOne(Status::class, 'DurumId', 'DurumId');
    }
}
