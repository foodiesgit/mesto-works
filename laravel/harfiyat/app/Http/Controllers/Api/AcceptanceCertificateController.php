<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\AcceptanceCertificate;
use App\Models\VehicleForCertificate;

use App\Http\Resources\AcceptanceCertificate\AcceptanceCertificateResource;
use App\Http\Resources\AcceptanceCertificate\AcceptanceCertificateCollection;

class AcceptanceCertificateController extends Controller
{
    public function index()
    {
        $datas = VehicleForCertificate::where('AracId', Auth::user()->AracId)->with(['acceptanceCertificate' => function($query){
                $query->where('BasvuruDurumId', 3)->orWhereNull('BasvuruDurumId');
            }]);
        $certificates = new AcceptanceCertificateCollection($datas->get());

        return response()->json(array('data' => $certificates, 'pagination' => null, 'status' => true, 'success_messages' => null, 'error_messages' => null), 200);
    }

    /*public function store(Request $request)
    {
        $companyId = trim($request->post('transporterCompanyId'));

        $exits = AcceptanceCertificate::all()->where('TasiyiciFirmaId', $companyId);//->where('',$password)->first();

        if(!is_null($exits))
        {
            return response()->json([
                'status' => true,
                'acceptanceCertificates'=>$exits
             ]);
        } else {
            return response()->json(['status' => false]);
        }
    }


    public function show($id)
    {
        $exits = AcceptanceCertificate::where('KabulBelgesiId', $id)->first();//->where('',$password)->first();

        if(!is_null($exits))
        {
            return response()->json([
                'status' => true,
                'acceptanceCertificate'=>$exits
             ]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }*/
}
