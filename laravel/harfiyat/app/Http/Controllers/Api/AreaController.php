<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;

use Illuminate\Http\Request;
use DB;
class AreaController extends Controller
{
    public function index()
    {
        // $exist = Vehicle::all();
        //
        // if(!is_null($exist))
        // {
        //     return response()->json([
        //         'status' => true,
        //         'vehicles'=>$exist
        //      ]);
        // } else {
        //     return response()->json(['status' => false]);
        // }
        $results = DB::select( DB::raw("SELECT DepolamaAlanId as id ,Ad as name , SP_GEOMETRY.ToString() as  map FROM DepolamaAlan WHERE AlanTipId !=  1 ") );

            return response()->json([
                'areas' => $results,
             ], 200);
    }


}
