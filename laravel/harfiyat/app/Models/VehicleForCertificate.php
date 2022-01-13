<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleForCertificate extends Model
{
    protected $table = 'KabulBelgesiArac';

    public function acceptanceCertificate()
    {
        return $this->hasOne(AcceptanceCertificate::class, 'KabulBelgesiId', 'KabulBelgesiId');
    }
}
