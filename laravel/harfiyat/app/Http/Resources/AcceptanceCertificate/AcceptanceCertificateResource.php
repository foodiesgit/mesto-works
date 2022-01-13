<?php

namespace App\Http\Resources\AcceptanceCertificate;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AcceptanceCertificate\AcceptanceCertificateCollection;

class AcceptanceCertificateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'KabulBelgesiId' => $this->KabulBelgesiId,
            'BelgeTarihi' => $this->acceptanceCertificate->BelgeTarihi,
            'BelgeNo' => $this->acceptanceCertificate->BelgeNo,
            'AtikAdres' => $this->acceptanceCertificate->AtikAdres,
            'TahminiAtikMiktari' => $this->acceptanceCertificate->TahminiAtikMiktari.' m³',
            'DepolamaAlanId' => $this->acceptanceCertificate->DepolamaAlanId,
            'DepolamaAlan_Ad' => $this->acceptanceCertificate->warehouse ? $this->acceptanceCertificate->warehouse->Ad : null,
            'AtikCinsiId' => $this->acceptanceCertificate->AtikCinsiId,
            'AtikCinsi_Ad' => $this->acceptanceCertificate->wastetype ? $this->acceptanceCertificate->wastetype->Ad : null,
        ];

    }
}