<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcceptanceCertificate;
use GuzzleHttp\Client;
use App\Models\ArventoArac;
class MapController extends Controller{
    public function index(){
        return view('map');
    }
    public function getVehicle(){
        $endpoint_vehicles = "https://aractakip.gaziantep.bel.tr/webservice/v1/Report.asmx/GetVehicleStatusJSON?Username=arvento62&PIN1=H2zcSNz%23gzu&PIN2=H2zcSNz%23gzu&callBack=";
        $vehicle_contents = substr(file_get_contents($endpoint_vehicles), 1, -2);
        return  $vehicle_contents;
    }
}
