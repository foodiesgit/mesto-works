<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;

use Image;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function getIndex(Request $request)
    {
        return view('backend.index');
    }
    public function getSetting(Request $request)
    {
        $settings = Setting::all();
        return view('backend.setting.site', compact('settings'));
    }
    public function postSetting(Request $request)
    {
        $data = $request->except(['_token']);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('setting.index');
    }
    
    
    public function uploadimage(Request $request)
    {
        if ($request->hasFile('upload'))
        {
            $image = $request->file('upload');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = public_path('upload/site/' . $filename);
            Image::make($request->file('upload')->getRealPath())->save($path);
            return response()->json([
                'uploaded' => 1,
                'fileName' => $filename,
                "url" => "/upload/site/" . $filename,
            ]);
        }
    }

    public function test(Request $request)
    {
        return view('backend.meeting.test');
    }

}
