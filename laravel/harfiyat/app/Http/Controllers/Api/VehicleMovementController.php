<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\VehicleMovement;
use App\Models\VehicleNotification;
use App\Models\Warehouse;
use App\Http\Requests\ListVehicleMovementRequest;
use App\Http\Requests\ShowVehicleMovementRequest;
use App\Http\Requests\StartVehicleMovementRequest;
use App\Http\Requests\StoreVehicleMovementRequest;

use App\Http\Resources\VehicleMovement\VehicleMovementResource;
use App\Http\Resources\VehicleMovement\VehicleMovementCollection;

use Carbon\Carbon;
use Location\Coordinate;
use Location\Polyline;
use Location\Distance\Vincenty;
//use Location\Line;
//use Location\Utility\PointToLineDistance;
//use Location\Utility\PointToPolylineDistance;

class VehicleMovementController extends Controller
{
    public function index(ListVehicleMovementRequest $request)
    {
        $datas = VehicleMovement::where('AracId', Auth::user()->AracId)->whereIn('DurumId', [1, 2])->where('KabulBelgesiId', $request->KabulBelgesiId);
        $vehicleMovements = new VehicleMovementCollection($datas->get());

        return response()->json(array('data' => $vehicleMovements, 'pagination' => null, 'status' => true, 'success_messages' => null, 'error_messages' => null), 200);
    }
    public function store(StoreVehicleMovementRequest $request)
    {
        $vehicleMovement = new VehicleMovement();

        $request['AracId'] = Auth::user()->AracId;

        $request['AracHareketId'] = $vehicleMovement->create($request->all())->AracHareketId;

        if ($request->AracHareketId == null) {
            return response()->json(array('data' => null, 'status' => 0, 'success_messages' => null, 'error_messages' => ['Talep oluşturulamadı!']), 500);
        }

        $datas = VehicleMovement::where('AracId', $request->AracId);

        if (isset($request->DurumId)) {
            $datas->where('DurumId', $request->DurumId);
        } else {
            $datas->whereIn('DurumId', [1, 2]);
        }

        $vehicleMovements = new VehicleMovementCollection($datas->get());

        return response()->json(array('data' => $vehicleMovements, 'pagination' => null, 'status' => true, 'success_messages' => ['Talebiniz başarıyla oluşturulmuştur.'], 'error_messages' => null), 200);
    }
    public function show(ShowVehicleMovementRequest $request)
    {
        $vehicleMovement = VehicleMovement::find($request->AracHareketId);

        $vehicleMovementResource = new VehicleMovementResource($vehicleMovement);

        return response()->json(array('data' => $vehicleMovementResource, 'status' => true, 'success_messages' => null, 'error_messages' => null), 200);
    }
    public function update(ShowVehicleMovementRequest $request)
    {
        $vehicleMovement = VehicleMovement::find($request->AracHareketId);

        $request['DokumTarihi'] = Carbon::now();
        $request['DurumId'] = 3;

        $vehicleMovement->update($request->all());

        $vehicleMovementResource = new VehicleMovementResource($vehicleMovement);

        return response()->json(array('data' => $vehicleMovementResource, 'status' => true, 'success_messages' => null, 'error_messages' => null), 200);
    }
    public function start(StartVehicleMovementRequest $request)
    {
        $vehicleMovement = VehicleMovement::find($request->AracHareketId);

        $vehicleMovement->update($request->all());

        $vehicleMovementResource = new VehicleMovementResource($vehicleMovement);

        return response()->json(array('data' => $vehicleMovementResource, 'status' => true, 'success_messages' => null, 'error_messages' => null), 200);
    }
    public function check(Request $request)
    {
        $current_point = new Coordinate(json_decode($request->current_point)[0], json_decode($request->current_point)[1]);

        $polyline = new Polyline();
        foreach(json_decode($request->points) as $point) {
            //return $point[0];
            $polyline->addPoint(new Coordinate($point[0], $point[1]));
        }

        //distance ayara bağla
        if (!$polyline->containsPoint($current_point, 500)) {
            $request['Aciklama'] = 'Araç belirlenen rotanın dışına çıktı.';

            /*$vehicleNotification = new VehicleNotification();
            $vehicleNotification->create($request->all());*/

            return response()->json(array('data' => null, 'status' => false, 'success_messages' => null, 'error_messages' => [$request->Aciklama]), 200);
        }
        return response()->json(array('data' => null, 'status' => true, 'success_messages' => ['Sorun yok.'], 'error_messages' => null), 200);

        /*$point = new Coordinate(37.363581,37.062234);

        $polyline = new Polyline();
        $polyline->addPoint(new Coordinate(37.356889,37.059318));
        $polyline->addPoint(new Coordinate(37.364888,37.060756));
        $polyline->addPoint(new Coordinate(37.363944,37.062441));
        $polyline->addPoint(new Coordinate(37.367738,37.063249));

        dd($polyline->containsPoint($point, 50));*/
    }

}
