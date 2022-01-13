<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel\Document;
use App\Models\Panel\City;
use App\Models\Panel\Waste;
use App\Models\Panel\District;
use App\Models\Panel\Parish;
use App\Models\Panel\Car;
use App\Models\Panel\Transporter;
use App\Models\Panel\Vehicle;
use DB;
class DocumentController extends Controller
{
    //
    function index(Request $request)
    {
      $data['M1'] = "";
      $data['M2'] = "active";
      $data['M3'] = "";
      $data['M4'] = "";

      $data['title'] = "Hafriyat Yönetim Sistemi [HYS]";
      //SAYAÇLAR
      $data['TOTAL_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->get()->count() ?? 0;
      $data['SUCCESS_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",2)->get()->count() ?? 0;
      $data['RED_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",5)->get()->count() ?? 0;
      $data['CONTINUE_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",1)->get()->count() ?? 0;

      $data['UnUploadedDocs'] = Document::where('IsletenKullaniciId',session('Id'))->orderBy('KabulBelgesiId', 'DESC')->get();
      // $request->session()->flash('message', "Gönderilmiş dökümanlar listeleniyor" );

      return view('panel.documents' , $data );

    }

    function edit(Request $request)
    {

      $key =  $request->input('key') ?? session('documents_key');

      $data['document'] = $document = Document::where("KabulBelgesiId" , $key)->get()->first();
      $data['PDF'] = DB::table("KabulBelgesiDosya")->where("KabulBelgesiId" , $key)->get();
      $data['Parish'] = Parish::where("IlceKodu" , $document->AtikIlceKodu)->get();
      $data['Vehicle'] = Vehicle::where("KabulBelgesiId" , $document->KabulBelgesiId)->get();

      $data['M1'] = "";
      $data['M2'] = "";
      $data['M3'] = "";
      $data['M4'] = "";
      $data['M5'] = "active";

       $data['title'] = "Hafriyat Yönetim Sistemi [HYS]";
       //SAYAÇLAR
       $data['TOTAL_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->get()->count() ?? 0;
       $data['SUCCESS_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",2)->get()->count() ?? 0;
       $data['RED_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",5)->get()->count() ?? 0;
       $data['CONTINUE_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",1)->get()->count() ?? 0;

       $Citys  = City::where('BelediyeId' , session('Tower'))->get()->first();
       $data['Districts'] = District::where('IlKodu' , $Citys->IlKodu)->get();
       $data['Waste'] = Waste::all();
       // $data['Cars'] = Car::where("AracDurumId",1)->orwhere("AracDurumId",2)->get();
       $data['Cars'] = Car::select(DB::raw('AzamiYukAgirlik,NetAgirlik,AracId,PlakaNo,Marka , FirmaAd = (select Ad From Firma where FirmaId = Arac.FirmaId)'))->where("AracDurumId",1)->orwhere("AracDurumId",2)->get();
       $data['Transporter'] = Transporter::where("TipId",1)->orwhere("TipId",3)->get();

       //$data['UnUploadedPermissionDocs'] = Paper::where('IsletenKullaniciId',session('Id'))->get();
       $data['UnUploadedDocs'] = Document::where('IsletenKullaniciId',session('Id'))->where('BasvuruDurumId',1)->orderBy('KabulBelgesiId', 'DESC')->get();

      return view('panel.dashboard_edit' , $data );
    }
}
