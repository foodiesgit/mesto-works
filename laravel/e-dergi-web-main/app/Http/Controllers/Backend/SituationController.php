<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Situation;
use App\Models\Type;

use Validator;

class SituationController extends Controller
{
    public function index(Request $request)
    {
        $situations = Situation::orderBy('id', 'DESC')->paginate(20)->withQueryString();

        return view('backend.situation.all', compact('situations', 'request'));
    }
    public function create(Request $request)
    {
        $types = Type::all();

        return view('backend.situation.create', compact('types'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
        ];
        $messages = [
            'name.required' => 'Ad Soyad zorunludur.',
            'name.max' => 'Ad Soyad max 255 karakter olmalıdır.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        if ($request->hasFile('images')) {
            $image    = $request->file('images');
            $filename = 'situation-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/situation/' . $filename);
            Image::make($request->file('images')->getRealPath())->save($path);
            $request['image'] = $filename;
        }

        Situation::create($request->all());

        return redirect()->route('situation.index')->with(['success' => 'Ekleme işleminiz başarılı.']);
    }
    public function edit(Request $request)
    {
        $situation = Situation::find($request->id);

        if (!$situation) {
            return redirect()->route('situation.index')->withError('Durum bulunamadı!');
        }
        if ($situation->is_deletable == 0) {
            return redirect()->route('situation.index')->withError('Durum güncellenemez!');
        }
        $types = Type::all();

        return view('backend.situation.edit', compact('request', 'situation', 'types'));
    }
    public function update(Request $request)
    {
        $situation = Situation::find($request->id);

        if (!$situation) {
            return redirect()->route('situation.index')->withError('Durum bulunamadı!');
        }
        if ($situation->is_deletable == 0) {
            return redirect()->route('situation.index')->withError('Durum güncellenemez!');
        }
        
        if ($request->hasFile('images')) {
            $image    = $request->file('images');
            $filename = 'situation-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/situation/' . $filename);
            Image::make($request->file('images')->getRealPath())->save($path);
            $request['image'] = $filename;
        }

        $situation->update($request->all());

        return redirect()->route('situation.index')->with(['success' => 'Güncelleme işleminiz başarılı.']);
    }
    public function delete(Request $request)
    {
        $situation = Situation::find($request->id);

        if (!$situation) {
            return redirect()->route('situation.index')->withError('Durum bulunamadı!');
        }
        if ($situation->is_deletable == 0) {
            return redirect()->route('situation.index')->withError('Durum silinemez!');
        }

        $situation->delete();
        
        return redirect()->route('situation.index')->with(['success' => 'Silme işleminiz başarılı.']);
    }
}