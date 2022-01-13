<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel\City;     // İl
use App\Models\Panel\District; // İlçe
use App\Models\Panel\Waste;    // Atık
use App\Models\Panel\Parish;   // Mahelle
use App\Models\Panel\Car;   // Kiralık Araçlar durum = 1 , durum  = 2
use App\Models\Panel\Transporter;   // Taşıyıcı Firmalar TipId 1,3
use App\Models\Panel\Document;
use App\Models\Panel\Paper;
use DB;
class DashboardController extends Controller
{
    //
    public function index()
    {
      $data['M1'] = "active";
      $data['M2'] = "";
      $data['M3'] = "";
      $data['M4'] = "";

       $data['title'] = "Hafriyat Yönetim Sistemi [HYS]";
       //SAYAÇLAR
       $data['TOTAL_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->get()->count() ?? 0;
       $data['SUCCESS_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",2)->get()->count() ?? 0;
       $data['RED_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",5)->get()->count() ?? 0;
       $data['CONTINUE_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",1)->get()->count() ?? 0;

       $Citys  = City::where('BelediyeId' , session('Tower'))->get()->first();
       $data['Districts'] = District::where('IlKodu' , $Citys->IlKodu)->get();
       $data['Waste'] = Waste::all();
       $data['Cars'] = Car::select(DB::raw('AzamiYukAgirlik,NetAgirlik,AracId,PlakaNo,Marka , FirmaAd = (select Ad From Firma where FirmaId = Arac.FirmaId)'))->where("AracDurumId",1)->orwhere("AracDurumId",2)->get();
       $data['Transporter'] = Transporter::where("TipId",1)->orwhere("TipId",3)->get();

       //$data['UnUploadedPermissionDocs'] = Paper::where('IsletenKullaniciId',session('Id'))->get();
       $data['UnUploadedDocs'] = Document::where('IsletenKullaniciId',session('Id'))->where('BasvuruDurumId',1)->orderBy('KabulBelgesiId', 'DESC')->get();
       $data['Parish'] = Parish::where("IlceKodu" ,"TR.02701")->get();
// ->select(DB::raw('Count(PlakaNo) as adet'))
      $data['TransporterGraphics'] = DB::table('Arac')->select(DB::raw('Count(Arac.PlakaNo) as Adet , FirmaAd = (select Ad From Firma where FirmaId = Arac.FirmaId)'))->groupby('Arac.FirmaId')->orderBy('Adet', 'DESC')->limit(10)->get();

      return view('panel.dashboard' , $data );
    }

    function cities( Request $request )
    {
          $id = $request->input('id');
          //$this->validate( $request, [ 'id' => 'required|exists:states,id' ] );
          $parish = Parish::where('IlceKodu',$id)->get();//where('state_id', $request->get('id') )->get();
          $output = [];
          foreach( $parish as $p )
          {
             $output[$p->MahalleKodu] = $p->MahalleAdi;
          }
          return $output;
    }
}
