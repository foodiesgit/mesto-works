<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Sign;
use Carbon\Carbon;
use Session;




class SignupController extends Controller
{
    //
    public function index()
    {
       if(session('Id'))
       {
         return redirect('dashboard')->with('message','Oturum otomatik açıldı');
       }
      return view('panel.login');
    }

    public function sign(Request $request)
    {

      $tckn =  $request->input('tckn');
      $password =  md5($request->input('password'));

      $SIGN = Sign::where('VergiTCNo' , $tckn )->where('TipId' ,"!=" ,"1" )->where('Sifre' , $password)->get()->first();
      if( $SIGN )
      {
           if ($SIGN->AktifMi == 0) {
             Session::flash('message', 'Bu kullanıcının durumu pasife alınmıştır. Oturum açalımaz !');
             return redirect('sign-up');
           }

           $SIGN->webGirisTarihi = Carbon::now();
           $Token = Hash::make(Carbon::now());
           $SIGN->Token = $Token;
           $SIGN->IPAdresi = $_SERVER['REMOTE_ADDR'];
           $SIGN->Platform = PHP_OS;
           $SIGN->save();
           Session::put('Id', $SIGN->FirmaId);
           Session::put('Name', $SIGN->Ad);
           Session::put('Address', $SIGN->Adres);
           Session::put('Tower', $SIGN->BelediyeId);

           ///Anahtarların Oluşumu
           return redirect('dashboard');
      }
      else
      {
        Session::flash('message', 'Şifre ve ya TCKN/VDN bulunamadı !');
        return redirect('sign-up');

      }
    }

    function exit()
    {
      Session::put('Id', NULL);
      Session::put('Name', NULL);
      Session::put('Address', NULL);
      Session::put('Tower', NULL);
      Session::flash('message', 'Oturum kapatılmıştır');
      return redirect('sign-up');
    }
}
