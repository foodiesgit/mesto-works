<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel\Document;
use App\Models\Panel\District;
use App\Models\Panel\Vehicle;
use App\Models\Panel\Paper;
use Carbon\Carbon;

class UpdateController extends Controller
{
    //
    function index(Request $request)
    {
      $KabulBelgesiId = $request->input('KabulBelgesiId');

      $Documentation = Document::where("KabulBelgesiId" , $KabulBelgesiId)->get()->first();
      if( @$Documentation->IsletenKullaniciId == session("Id"))
      {

        // if($request->input('permission') == "on")
        // {
        //   $Documentation->Revizyon = $Documentation->Revizyon+1;
        // }
        $Documentation->Revizyon = $Documentation->Revizyon+1;
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
        $Documentation->EvrakIzni = 1;
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
          $request->session()->flash('message', "Belge başarıyla güncellenmiştir." );

          if($request->input('AracId'))
          {
            $vehicle = Vehicle::where("KabulBelgesiId" , $KabulBelgesiId )->delete();

            foreach ($request->input('AracId') as $key => $value) {
              //araç silinimi.
                $vehicle = new Vehicle();
                $vehicle->AracId = $value;
                $vehicle->KabulBelgesiId = $KabulBelgesiId;
                $vehicle->IsletenId = 0;
                $vehicle->IsletenKullaniciId = session('Id');
                $vehicle->save();
            }
          }
          else
          {
            $vehicle = Vehicle::where("KabulBelgesiId" , $KabulBelgesiId )->delete();
          }

          ///EKLERİN YÜKLENMESİ
          $files = $request->file('attachment');
          if($request->hasFile('attachment'))
          {
            foreach ($files as $file) {
                $file->store('docs/' . session('Id') . '/'.$KabulBelgesiId);
                $fileName      = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $destinationPath = 'uploads/docs/'. session('Id') . '/'.$KabulBelgesiId;
                //$destinationPath = 'uploads/docs/';
                $file->move($destinationPath,md5($fileName).".".$fileExtension);

                $paper = new Paper();
                $paper->KabulBelgesiId = $KabulBelgesiId;
                $paper->EklenmeTarihi = Carbon::now();
                $paper->TamYol = $destinationPath."/".md5($fileName).".".$fileExtension;
                $paper->IsletenKullaniciId = session('Id');
                $paper->save();
            }
          }
          ////EKLERİN YÜKLENMESİ BİTİŞ
        }
        else
        {
          $request->session()->flash('message', "Güncelleme sisteme kayıt edilmedi." );
        }
        $request->session()->put('documents_key',$KabulBelgesiId);

        //return redirect()->back();
        return redirect('/documents');
      }
      else
      {
        $request->session()->put('documents_key',$KabulBelgesiId);
        $request->session()->flash('message', "Bu belgeyi düzenleme yetkiniz yoktur.Erişim engellendi." );
        return redirect()->back();
      }
    }
}
