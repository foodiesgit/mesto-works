<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel\Document;
use App\Models\Panel\Paper;
use Carbon\Carbon;
class UploadController extends Controller
{
    //
    function index(Request $request)
    {
      $files = $request->file('attachment');

      if($request->hasFile('attachment'))
      {
        $DOC = Document::where("KabulBelgesiId" , $request->input('doc'))->get()->first();
        if(  $DOC->EvrakIzni == 1)
        {
          $request->session()->flash('message', "Bu kabul belgesine daha önce evrak ilişkilendirilmesi yapılmış. Lütfen talebin onaylanmasını ya da red edilmesini bekleyiniz." );
          return redirect()->back();
        }
        else
        {
          foreach ($files as $file) {
              $file->store('docs/' . session('Id') . '/'.$request->input('doc'));
              $fileName      = $file->getClientOriginalName();
              $fileExtension = $file->getClientOriginalExtension();
              $fileSize      = $file->getSize();
              $fileMime      = $file->getMimeType();
              $destinationPath = 'uploads/docs/'. session('Id') . '/'.$request->input('doc');
              //$destinationPath = 'uploads/docs/';
              $file->move($destinationPath,md5($fileName).".".$fileExtension);

              $paper = new Paper();
              $paper->KabulBelgesiId = $request->input('doc');
              $paper->EklenmeTarihi = Carbon::now();
              $paper->TamYol = $destinationPath."/".md5($fileName).".".$fileExtension;
              $paper->IsletenKullaniciId = session('Id');
              $paper->save();
          }
          //die($request->input('doc'));
          $DOC = Document::where("KabulBelgesiId" , $request->input('doc'))->get()->first();
          $DOC->EvrakIzni = 1;
          $DOC->save();
          $request->session()->flash('message', "Dosyalarınız belgeniz ile ilişkilendirilmiştir." );
          return redirect()->back();
        }

      }
      $request->session()->flash('message', "Lütfen dosya seçiniz." );
      return redirect()->back();
    }
}
