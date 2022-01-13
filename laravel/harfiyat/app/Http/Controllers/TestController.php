<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use stdClass;

use App\Models\ArventoArac;

class TestController extends Controller
{
    //
    public function index(){
        ArventoArac::truncate();
      $arventoarac = new ArventoArac();
      $arventoarac->Plaka = "22EF100";
      $arventoarac->AracTakipId ="5";
      $arventoarac->save();

      // try {
      // $client = new SoapClient("http://soap.netgsm.com.tr:8080/Sms_webservis/SMS?wsdl");
      //
      // $msg  = 'test1';
      // $gsm  = array('905538081197');
      //
      //
      // $Result = $client -> smsGonder1NV2(array('username'=>'3426060643', 'password' => 'L85KKM5R', 'header' => '3426060643', 'msg' => 'TEST 1 ', 'gsm' => $gsm,  'filter' => '', 'startdate'  => '', 'stopdate'  => '', 'encoding' => ''  ));
      //
      // } catch (Exception $exc)
      //  {
      //
      //  echo "Soap Hatasi Olustu: " . $exc->getMessage();
      // }


    }
}
