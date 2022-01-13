<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'Firma';
    
    protected $primaryKey = 'FirmaId';

    protected $fillable = ['Ad', 'FirmaTipId', 'VergiDairesi','VergiTCNo', 'IlKodu', 'IlceKodu', 'Adres', 'YetkiBelgesiKod', 'YetkiBelgesiTarih', 'SicilNo', 'GSM1', 'Tel', 'EPosta', 'Aciklama', 'IsletenId', 'IsletenKullaniciId', 'EklemeTarihi', 'GuncelleyenKullaniciId', 'GuncellemeTarihi', 'AktifMi', 'BelediyeId', 'TipId'];
}
