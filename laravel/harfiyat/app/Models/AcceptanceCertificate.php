<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcceptanceCertificate extends Model
{
    protected $table = 'KabulBelgesi';

    protected $primaryKey = 'KabulBelgesiId';

    protected $fillable = ['IlceBelediyeKodu', 'BelgeTarihi', 'BelgeNo', 'SozlesmeNo', 'TasiyiciFirmaId', 'UreticiFirmaId', 'AtikBirimFiyati', 'AtikBirimiId', 'TahminiAtikMiktari', 'GerceklesenAtikMiktari', 'AtikTutari', 'AtikCinsiId', 'GecerlilikTarihi', 'RuhsatNo', 'RuhsatTarihi', 'AtikIlKodu', 'AtikIlceKodu', 'AtikMahalleKodu', 'AtikPafta', 'AtikAda', 'AtikParsel', 'AtikAdres', 'DepolamaAlanId', 'Aciklama', 'IsTuru', 'IhaleKayitNo', 'IhaleBaslangicTarihi', 'IhaleBitisTarihi', 'BasvuruDurumId', 'BasvuruRetNedeni', 'AktifMi', 'PasifNedeniId', 'BelediyeId', 'IsletenId', 'IsletenKullaniciId', 'EklemeTarihi', 'GuncelleyenKullaniciId', 'GuncellemeTarihi', 'IlDisi', 'Platform'];

    public function warehouse()
    {
        return $this->hasOne(Warehouse::class, 'DepolamaAlanId', 'DepolamaAlanId');
    }
    public function wastetype()
    {
        return $this->hasOne(WasteType::class, 'AtikCinsiId', 'AtikCinsiId');
    }
}
