<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApiModels\Vehicle;
use App\Models\ApiModels\VehicleOfCertificate;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $exist = Vehicle::all();

        if(!is_null($exist))
        {
            return response()->json([
                'status' => true,
                'vehicles'=>$exist
             ]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $exist = Vehicle::where('AracId', $id)->first();//->where('',$password)->first();

        if(!is_null($exist))
        {
            return response()->json([
                'status' => true,
                'vehicle'=>$exist
             ]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
