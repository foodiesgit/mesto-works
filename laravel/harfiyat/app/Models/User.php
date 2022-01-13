<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'Arac';
    
    protected $primaryKey = 'AracId';

    protected $fillable = ['PlakaNo', 'FirmaId', 'Sifre', 'AracCinsiId', 'Marka', 'NetAgirlik', 'AzamiYukAgirlik', 'AracDurumId', 'Aciklama', 'PasifNedeni', 'BelediyeId', 'IsletenId', 'IsletenKullaniciId', 'EklemeTarihi', 'GuncelleyenKullaniciId', 'GuncellemeTarihi', 'SilindiMi'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Sifre',
    ];


    public function getAuthPassword()
    {
      return $this->Sifre;
    }
    
    public function company()
    {
        return $this->hasOne(Company::class, 'FirmaId', 'FirmaId');
    }
    public function type()
    {
        return $this->hasOne(VehicleType::class, 'AracCinsId', 'AracCinsiId');
    }
    public function transportPermits()
    {
        return $this->hasMany(TransportPermit::class, 'AracId', 'AracId');
    }
}
