<?php

namespace App\Http\Controllers;
use App\Http\Requests\ServicesCreateRequest;
use App\Http\Requests\ServicesUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Services;
class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(ServicesCreateRequest $request)
    {
        $checkService = Services::where('title',$request->title)->get();
        if(count($checkService) > 0){
            return redirect()->route('services.index')->withErrors('Bu Hizmet Sistemde Kayıtlı');
        } else {
            if($request->hasFile('image')){
                $fileName = 'upload/services/'.$request->title.'.'.$request->image->extension();
                $request->image->move(public_path('/upload/services'), $fileName);
                $request->merge(['image' => $fileName]);
            }
            Services::create($request->post());
            return redirect()->route('services.index')->withSuccess('Yeni Hizmet Başarı ile Oluşturuldu');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $services = Services::find($id);
        return view('admin.services.edit', compact('services'));
    }
    public function update(ServicesUpdateRequest $request, $id)
    {
        $fileName = 'upload/services/'.$request->title.'.'.$request->image->extension();
        $request->image->move(public_path('/upload/services'), $fileName);
        Services::where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $fileName
        ]);
        return redirect()->route('services.index')->withSuccess('Güncelleme Başarılı');
    }
    public function destroy($id)
    {
        $deleteService =  Services::where('id', $id)->first();
        Services::where('id',$id)->delete();
        if($deleteService->image){
            unlink($deleteService->image);
        }
        Services::where('id',$id)->delete();
        return redirect()->route('services.index')->withSuccess('Hizmet Silindi');
    }
}
