<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\LoginRequest;
use App\Models\Vehicle;

use Carbon\Carbon;

class AuthController extends Controller
{
    public function getError(Request $request)
    {
        return response()->json(array('data' => null, 'status' => 0, 'success_messages' => null, 'error_messages' => ['Unauthenticated!']), 401);
    }
    public function login(LoginRequest $request)
    {
        $vehicle = Vehicle::where('PlakaNo', $request->PlakaNo)->where('Sifre', md5($request->Sifre))->first();
        
        if (!$vehicle /* && !Auth::loginUsingId($vehicle->AracId)*/ ) {
            return response()->json(array('data' => null, 'status' => 0, 'success_messages' => null, 'error_messages' => ['Plaka No veya Şifre yanlış.']), 401);
        }
        //dd(Auth::user());

        //$d_vehicle = Auth::user();

        $tokenData = $vehicle->createToken('Personel Access Token');

        $token = $tokenData->token;
        $token->expires_at = Carbon::now()->addYear();

        $transportPermit_BelgeNo = null;
        $transportPermit_BaslangicTarihi = null;
        $transportPermit_BitisTarihi = null;
        $transportPermit_AktifMi = null;

        if ($vehicle->transportPermits()->count() > 0) {
            $transportPermits = $vehicle->transportPermits();
            if ($transportPermit = $transportPermits->first()) {
                $transportPermit_BelgeNo = $transportPermit->BelgeNo;
                $transportPermit_BaslangicTarihi = $transportPermit->BaslangicTarihi;
                $transportPermit_BitisTarihi = $transportPermit->BitisTarihi;
                $transportPermit_AktifMi = $transportPermit->AktifMi;
            }
        }


        $data = [
            'AracId' => $vehicle->AracId,
            'Firma' => $vehicle->company ? $vehicle->company->Ad : null,
            'PlakaNo' => $vehicle->PlakaNo,
            'AracCinsi' => $vehicle->type ? $vehicle->type->Ad : null,
            'Marka' => $vehicle->Marka,
            'NetAgirlik' => $vehicle->NetAgirlik,
            'AzamiYukAgirlik' => $vehicle->AzamiYukAgirlik,
            'token_type' => 'Bearer',
            'access_token' => $tokenData->accessToken,
            'expires_at' => $token->expires_at->format('Y-m-d H:i:s'),
            'transportPermit_BelgeNo' => $transportPermit_BelgeNo,
            'transportPermit_BaslangicTarihi' => @$transportPermit_BaslangicTarihi,
            'transportPermit_BitisTarihi' => @$transportPermit_BitisTarihi,
            'transportPermit_AktifMi' => @$transportPermit_AktifMi,
        ];

        // plaka, araç cinsi, firma bilgileri (firma adı), taşıma izin belgesi (belge no, başlangıç-bitiş tarihi, aktifMi) 

        return response()->json(array('data' => $data, 'status' => true, 'success_messages' => null, 'error_messages' => null), 200);
   }

    public function profile(Request $request)
    {
        $vehicle = Auth::user();

        $transportPermit_BelgeNo = null;
        $transportPermit_BaslangicTarihi = null;
        $transportPermit_BitisTarihi = null;
        $transportPermit_AktifMi = null;

        if ($vehicle->transportPermits()->count() > 0) {
            $transportPermits = $vehicle->transportPermits();
            if ($transportPermit = $transportPermits->first()) {
                $transportPermit_BelgeNo = $transportPermit->BelgeNo;
                $transportPermit_BaslangicTarihi = $transportPermit->BaslangicTarihi;
                $transportPermit_BitisTarihi = $transportPermit->BitisTarihi;
                $transportPermit_AktifMi = $transportPermit->AktifMi;
            }
        }

        $data = [
            'AracId' => $vehicle->AracId,
            'Firma' => $vehicle->company ? $vehicle->company->Ad : null,
            'PlakaNo' => $vehicle->PlakaNo,
            'AracCinsi' => $vehicle->type ? $vehicle->type->Ad : null,
            'Marka' => $vehicle->Marka,
            'NetAgirlik' => $vehicle->NetAgirlik,
            'AzamiYukAgirlik' => $vehicle->AzamiYukAgirlik,
            'transportPermit_BelgeNo' => $transportPermit_BelgeNo,
            'transportPermit_BaslangicTarihi' => @$transportPermit_BaslangicTarihi,
            'transportPermit_BitisTarihi' => @$transportPermit_BitisTarihi,
            'transportPermit_AktifMi' => @$transportPermit_AktifMi,
        ];

        return response()->json(array('data' => $data, 'status' => true, 'success_messages' => null, 'error_messages' => null), 200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::user()->tokens->each(function($token, $key) {
            $token->delete();
        });
        Auth::logout();

        return response()->json(array('data' => $data, 'status' => true, 'success_messages' => null, 'error_messages' => null), 200);
    }
}
