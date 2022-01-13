<?php

namespace App\Http\Resources\VehicleMovement;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\VehicleMovement\VehicleMovementCollection;

use Illuminate\Support\Facades\DB;

class VehicleMovementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $DepolamaAlan_SP_GEOMETRY = null;
        if ($this->warehouse) {
            if ($this->warehouse->SP_GEOMETRY) {
                $geoPoint = DB::select("Select top 1 SP_GEOMETRY.STAsText() as polygon from DepolamaAlan where DepolamaAlanId=".$this->DepolamaAlanId);
                $var = str_replace("POLYGON ((", "", $geoPoint[0]->polygon);
                $var = str_replace("))", "", $var);
                $DepolamaAlan_SP_GEOMETRY = explode(", ",$var);
            }
        }
        return [
            'AracHareketId' => $this->AracHareketId,
            'KabulBelgesiId' => $this->KabulBelgesiId,
            'AracId' => $this->AracId,
            'IstekTarih' => $this->IstekTarih,
            'OnaylanmaTarihi' => $this->OnaylanmaTarihi,
            'DokumTarihi' => $this->DokumTarihi,
            'DepolamaAlanId' => $this->DepolamaAlanId,
            'DepolamaAlan_Ad' => $this->warehouse ? $this->warehouse->Ad : null,
            'DepolamaAlan_SP_GEOMETRY' => $DepolamaAlan_SP_GEOMETRY,
            'DurumId' => $this->DurumId,
            'DurumAd' => $this->status ? $this->status->Durum : null,
            'Rota' => $this->Rota,
        ];

    }
}
