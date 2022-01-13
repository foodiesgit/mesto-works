<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\ArventoArac;

use GuzzleHttp\Client;

class pairNodePlate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pairNodePlate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pair Node Plate';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $endpoint_vehicles = "https://aractakip.gaziantep.bel.tr/webservice/v1/Report.asmx/GetVehicleStatusJSON?Username=arvento62&PIN1=H2zcSNz%23gzu&PIN2=H2zcSNz%23gzu&callBack=";

        $vehicle_contents = substr(file_get_contents($endpoint_vehicles), 1, -2);

        $json_vehicles = json_decode($vehicle_contents, true);

        $arr = array();

        ArventoArac::truncate();

        for ($i=0; $i < count($json_vehicles); $i++) {
      //  for ($i=0; $i < 50; $i++) {

            $plaka = null;

            if ($json_vehicles[$i]["Node"] != null && $json_vehicles[$i]["Node"]) {

                $endpoint_vehicle = "https://aractakip.gaziantep.bel.tr/webservice/v1/Report.asmx/GetLicensePlateFromNode?Username=arvento62&PIN1=H2zcSNz%23gzu&PIN2=H2zcSNz%23gzu&Node=".$json_vehicles[$i]["Node"];

                $content = file_get_contents($endpoint_vehicle);

                if (isset($content) && !strpos($content, "nil")) {
                    $json_vehicle = simplexml_load_string($content);
                    $json_vehicleee = json_encode($json_vehicle, true);
                    $json_plate = json_decode($json_vehicleee, true);

                    $plaka = $json_plate[0];
                }
            }

            if ($plaka != null && $plaka != 'null' && isset($plaka)) {

                $arventoarac = new ArventoArac();
                $arventoarac->Plaka = $plaka;
                $arventoarac->AracTakipId = $json_vehicles[$i]["Node"];
                $arventoarac->save();
            }
        }

    }
}
