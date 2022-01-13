<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AcceptanceCertificate;

use GuzzleHttp\Client;

class AlarmController extends Controller
{
    public function index()
    {
      \Artisan::call('cache:clear');
      \Artisan::call('optimize:clear');
        //return view('map');
    }

    public function getStatus()
    {
        $alarm = file_get_contents("https://aractakip.gaziantep.bel.tr/webservice/v1/Report.asmx/GetVehicleAlarmStatusV2?Username=arvento62&PIN1=H2zcSNz%23gzu&PIN2=H2zcSNz%23gzu&Language=TR");
        $data = json_decode($alarm, true);
        return $alarm;
    }


}
