<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel\Document;
use DB;

class CrediCartController extends Controller
{
    //
    function index()
    {

        $data['M1'] = "";
        $data['M2'] = "";
        $data['M3'] = "active";
        $data['M4'] = "";

        $data['title'] = "Hafriyat Yönetim Sistemi [HYS]";
        //SAYAÇLAR
        $data['TOTAL_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->get()->count() ?? 0;
        $data['SUCCESS_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",2)->get()->count() ?? 0;
        $data['RED_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",5)->get()->count() ?? 0;
        $data['CONTINUE_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",1)->get()->count() ?? 0;

        $data['UnUploadedDocs'] = Document::where('IsletenKullaniciId',session('Id'))->orderBy('KabulBelgesiId', 'DESC')->get();
        $data['PaymentDocs'] = Document::where('IsletenKullaniciId',session('Id'))->orderBy('KabulBelgesiId', 'DESC')->get();
        // $request->session()->flash('message', "Gönderilmiş dökümanlar listeleniyor" );

      //   $data['Datas'] = Datas::where('Datas.UserId' , session('Id'))
      // ->join('Facilities','Facilities.id','=','Datas.FacilityId')->get();

        $data['payments'] = DB::table('KabulBelgesiOdeme')
        ->join('KabulBelgesi','KabulBelgesiOdeme.KabulBelgesiId' , '=' , 'KabulBelgesi.KabulBelgesiId')
        ->where('KabulBelgesiOdeme.IsletenKullaniciId', session('Id') )
        ->orderBy('KabulBelgesiOdeme.Id' , 'DESC')
        ->get();
        
        return view('panel.payments' , $data );
     }
}
