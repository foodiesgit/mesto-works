<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel\Payment;
use App\Models\Panel\Document;
use App\Models\Panel\Current;
use App\Models\Panel\D;
use DB;
class PaymentController extends Controller
{
    function index(Request $request)
    {

    }
    //
    function show(Request $request)
    {
      $key = $request->input('key');

      $data['doc'] =  Document::where('KabulBelgesiId' , $key)->get()->first();
      $ODEME = D::where('KabulBelgesiId',$data['doc']->KabulBelgesiId )->where('OdemeBasariDurumu' , 1)->get()->first();
      if($ODEME)
      {
        return redirect('/documents')->with('messages' , 'Tekrar Ödeme Yapılamaz');

      }
      //Tutar Hesaplama
      $cari = DB::table('CariHareket')
             ->select(DB::raw('sum(borc) as borc , sum(alacak) as alacak'))
             ->where('KabulBelgesiId', '=', $data['doc']->KabulBelgesiId)
             ->whereIn('CariHareketTipId', array(1, 2))
             ->get();

      $borc = (float)$cari[0]->borc ;
      $alacak = (float)$cari[0]->alacak ;

      $request->session()->put('odeme', ($borc - $alacak));

      $request->session()->put('doc', $data['doc']->KabulBelgesiId);

      $data['M1'] = "";
      $data['M2'] = "";
      $data['M3'] = "";
      $data['M4'] = "active";

      $data['title'] = "Hafriyat Yönetim Sistemi [HYS]";
      //SAYAÇLAR
      $data['TOTAL_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->get()->count() ?? 0;
      $data['SUCCESS_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",2)->get()->count() ?? 0;
      $data['RED_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",5)->get()->count() ?? 0;
      $data['CONTINUE_DOC'] = Document::where("IsletenKullaniciId",session("Id"))->where("BasvuruDurumId",1)->get()->count() ?? 0;

      $data['UnUploadedDocs'] = Document::where('IsletenKullaniciId',session('Id'))->orderBy('KabulBelgesiId', 'DESC')->get();
      $data['PaymentDocs'] = Document::where('IsletenKullaniciId',session('Id'))->orderBy('KabulBelgesiId', 'DESC')->get();
      // $request->session()->flash('message', "Gönderilmiş dökümanlar listeleniyor" );
      return view('panel.credicart' , $data );
    }
}
