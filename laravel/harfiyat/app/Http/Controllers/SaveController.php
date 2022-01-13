<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel\Document;
use App\Models\Panel\District;
use App\Models\Panel\Vehicle;
use App\Models\Panel\Paper;
use Carbon\Carbon;

class SaveController extends Controller
{
  function unique_code($limit)
  {
    return strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit));
  }

  public function index(Request $request)
  {

    $messageTMP = "";
    $Documentation = new Document();
    $Documentation->BelgeNo = "WEB".$this->unique_code(9).date("Ymd");
    $Documentation->IlceBelediyeKodu = $IlceKodu = $request->input('IlceBelediyeKodu');
    $Documentation->BelgeTarihi = $request->input('BelgeTarihi');
    $Documentation->IsTuru = $IsTuru = $request->input('IsTuru');
    $Documentation->AtikCinsiId = $request->input('AtikCinsiId');
    $Documentation->TahminiAtikMiktari  = $request->input('TahminiAtikMiktari');
    $Documentation->AtikBirimiId = $request->input('AtikBirimiId');
    $Documentation->RuhsatNo = $request->input('RuhsatNo');
    $Documentation->RuhsatTarihi = $request->input('RuhsatTarihi');
    $Documentation->AtikIlceKodu = $request->input('AtikIlceKodu');
    $Documentation->AtikMahalleKodu = $request->input('AtikMahalleKodu');
    $Documentation->AtikAda= $request->input('AtikAda');
    $Documentation->AtikParsel= $request->input('AtikParsel');
    $Documentation->AtikPafta= $request->input('AtikPafta');
    $Documentation->Aciklama  = $request->input('Aciklama');
    $Documentation->TasiyiciFirmaId  = $request->input('TasiyiciFirmaId');
    $Documentation->AtikAdres = $request->input('AtikAdres');
    $Documentation->BasvuruDurumId = 1;
    $Documentation->BelediyeId = 18;
    $Documentation->Platform = "Web";
    $Documentation->IsletenId = 0;
    $Documentation->IsletenKullaniciId = session('Id');
    $Documentation->UreticiFirmaId = session('Id');
    $Documentation->AtikIlKodu = District::where("IlceKodu" , $IlceKodu )->get()->first()->IlKodu;
    if($IsTuru == "2")
    {
      $Documentation->IhaleBaslangicTarihi = $request->input('IhaleBaslangicTarihi');
      $Documentation->IhaleBitisTarihi = $request->input('IhaleBitisTarihi');
      $Documentation->IhaleKayitNo = $request->input('IhaleKayitNo');
    }

    if($Documentation->save())
    {
      $messageTMP .= " Belge başarıyla oluşturuldu ve sisteme eklendi. ";
    }
    else
    {
      $messageTMP .= " Belge veri tabanına kayıt edilemedi. ";

    }
    $docId = $Documentation->KabulBelgesiId;

    if($request->input('AracId'))
    {
      foreach ($request->input('AracId') as $key => $value) {
          $vehicle = new Vehicle();
          $vehicle->AracId = $value;
          $vehicle->KabulBelgesiId = $docId;
          $vehicle->IsletenId = 0;
          $vehicle->IsletenKullaniciId = session('Id');
          $vehicle->save();
      }
      $messageTMP .= " Belgeye araçlar başarıyla eklendi. ";
    }
    else {
      $messageTMP .= " Belgeye araç eklenmedi. ";


    }


    ///EKLERİN YÜKLENMESİ
    $files = $request->file('attachment');
    if($request->hasFile('attachment'))
    {
      foreach ($files as $file) {
          $file->store('docs/' . session('Id') . '/'.$docId);
          $fileName      = $file->getClientOriginalName();
          $fileExtension = $file->getClientOriginalExtension();
          $destinationPath = 'uploads/docs/'. session('Id') . '/'.$docId;

          $fileSize      = $file->getSize();
          $fileMime      = $file->getMimeType();
          //$destinationPath = 'uploads/docs/';
          if( $fileMime == "application/pdf" )
          {
            $file->move($destinationPath,md5($fileName).".".$fileExtension);

            $paper = new Paper();
            $paper->KabulBelgesiId = $docId;
            $paper->EklenmeTarihi = Carbon::now();
            $paper->TamYol = $destinationPath."/".md5($fileName).".".$fileExtension;
            $paper->IsletenKullaniciId = session('Id');
            $paper->save();
          }
          else
          {
            $request->session()->flash('message', "Bu belge iptal edildi. Lütfen sadece pdf formatında evrak ekleyiniz." );
            return redirect()->back();
          }

      }
      $messageTMP .= "Belgeye Ek/ler eklendi";
      $messageTMP .= "Belgeye Ek eklemeye kapatıldı";
      ///Kilitleme
      $PERM = Document::where("KabulBelgesiId" , $docId )->get()->first();
      $PERM->EvrakIzni = 1;
      $PERM->save();
    }
    ////EKLERİN YÜKLENMESİ BİTİŞ

    $request->session()->flash('message', $messageTMP );
    return redirect('/documents');


    /*ARAÇLAR*/
    //$AracId = $request->input('AracId');
    //var_dump($AracId);


  }
}
