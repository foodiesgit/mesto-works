<?php

namespace App\Http\Resources\AcceptanceCertificate;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AcceptanceCertificateCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
