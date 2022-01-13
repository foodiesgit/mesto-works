<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApiModels\VehicleNotification;
use Illuminate\Http\Request;

class VehicleNotificationController extends Controller
{
    //create
    public function create(Request $request)
    {
        $vehicleMovementId      = trim($request->post('vehicleMovementId'));
        $description            = trim($request->post('description'));
        $x                      = trim($request->post('x'));
        $y                      = trim($request->post('y'));
        //
        $date                   = date("Y-m-d H:i:s");
        //
        $data = new VehicleNotification;
        $data->AracHareketId = $vehicleMovementId;
        $data->Aciklama = $description;
        $data->UyariTarihi = $date;
        $data->X = $x;
        $data->Y = $y;
        //
        $data->save();
        //
        if(!is_null($data->AracUyariId))
        {
            return response()->json([
                'status' => true,
                'vehicleNotificationId'=> $data->AracUyariId
            ]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
