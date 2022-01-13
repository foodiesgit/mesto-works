<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MagazineDraft;

use Image;
use Validator;

class MagazineDraftController extends Controller
{
    public function index(Request $request)
    {
        $drafts = MagazineDraft::orderBy('id', 'DESC')->paginate(20)->withQueryString();

        return view('backend.magazinedraft.all', compact('drafts', 'request'));
    }
    public function create(Request $request)
    {
        return view('backend.magazinedraft.create', compact('request'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            //'images' => 'required|mimes:png|dimensions:min_width=100,min_height=200',
            'images' => 'required|mimes:png',
        ];
        $messages = [
            'name.required' => 'Taslak Adı zorunludur.',
            'name.max' => 'Taslak Adı max 255 karakter olmalıdır.',
            'images.required' => 'Görsel zorunludur.',
            'images.mimes' => 'Görsel png olmalıdır.',
            'images.dimensions' => 'Görselin eni min 100, boyu min 200 olmalıdır.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('images')) {
            $image    = $request->file('images');
            $filename = 'draft-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/magazine/' . $filename);
            Image::make($request->file('images')->getRealPath())->save($path);
            $request['image'] = $filename;
        }

        MagazineDraft::create($request->all());

        return redirect()->route('magazinedraft.index')->with(['success' => 'Ekleme işleminiz başarılı.']);
    }
    public function edit(Request $request)
    {
        $magazinedraft = MagazineDraft::find($request->id);

        if (!$magazinedraft) {
            return redirect()->route('magazinedraft.index')->withError('Taslak bulunamadı!');
        }

        return view('backend.magazinedraft.edit', compact('magazinedraft', 'request'));
    }
    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            //'images' => 'required|mimes:png|dimensions:min_width=100,min_height=200',
            'images' => 'required|mimes:png',
        ];
        $messages = [
            'name.required' => 'Taslak Adı zorunludur.',
            'name.max' => 'Taslak Adı max 255 karakter olmalıdır.',
            'images.required' => 'Görsel zorunludur.',
            'images.mimes' => 'Görsel png olmalıdır.',
            'images.dimensions' => 'Görselin eni min 100, boyu min 200 olmalıdır.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $magazinedraft = MagazineDraft::find($request->id);

        if (!$magazinedraft) {
            return redirect()->route('magazinedraft.index')->withError('Taslak bulunamadı!');
        }

        if ($request->hasFile('images')) {
            $image    = $request->file('images');
            $filename = 'draft-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/magazine/' . $filename);
            Image::make($request->file('images')->getRealPath())->save($path);
            $request['image'] = $filename;
        }
            
        $magazinedraft->update($request->all());

        return redirect()->route('magazinedraft.index')->with(['success' => 'Güncelleme işleminiz başarılı.']);
    }
    public function delete(Request $request)
    {
        $magazinedraft = MagazineDraft::find($request->id);

        if (!$magazinedraft) {
            return redirect()->route('magazinedraft.index')->withError('Taslak bulunamadı!');
        }

        $magazinedraft->delete();
        
        return redirect()->route('magazinedraft.index')->with(['success' => 'Silme işleminiz başarılı.']);
    }
}