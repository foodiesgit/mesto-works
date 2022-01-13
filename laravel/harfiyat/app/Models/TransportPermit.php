<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportPermit extends Model
{
    protected $table = 'TasimaIzinBelgesi';
    
    protected $primaryKey = 'TasimaIzinBelgeId';

    protected $fillable = ['BelgeNo', 'FirmaId', 'AracId', 'BaslangicTarihi', 'BitisTarihi', 'UstYaziId', 'Aciklama', 'GuncelleyenKullaniciId', 'GuncellemeTarihi', 'BelediyeId', 'IsletenId', 'IsletenKullaniciId', 'EklemeTarihi', 'AktifMi', 'PasifNedeniId'];
}
