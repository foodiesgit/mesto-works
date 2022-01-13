<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Magazine;
use App\Models\MagazineTransaction;
use App\Models\Situation;

use Image;
use Validator;

class MagazineController extends Controller
{
    public function index(Request $request)
    {
        $magazines = Magazine::with('likes')->orderBy('id', 'DESC')->paginate(20)->withQueryString();

        return view('backend.magazine.all', compact('magazines', 'request'));
    }
    public function create(Request $request)
    {
        return view('backend.magazine.create', compact('request'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            //'images' => 'required|mimes:png|dimensions:min_width=100,min_height=200',
            'images' => 'required|mimes:png',
        ];
        $messages = [
            'name.required' => 'Dergi Adı zorunludur.',
            'name.max' => 'Dergi Adı max 255 karakter olmalıdır.',
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
            $filename = 'magazine-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/magazine/' . $filename);
            Image::make($request->file('images')->getRealPath())->save($path);
            $request['image'] = $filename;
        }

        $request['magazine_id'] = Magazine::create($request->all())->id;

        MagazineTransaction::create($request->all());

        return redirect()->route('magazine-page.index', ['magazine_id' => $request->magazine_id])->with(['success' => 'Ekleme işleminiz başarılı. Sayfalarınız için postları seçmeye başlayabilirsiniz.']);
    }
    public function edit(Request $request)
    {
        $magazine = Magazine::find($request->id);

        if (!$magazine) {
            return redirect()->route('magazine.index')->withError('Dergi bulunamadı!');
        }
        $situations = Situation::magazine()->orderBy('name')->get();

        return view('backend.magazine.edit', compact('magazine', 'request', 'situations'));
    }
    public function update(Request $request)
    {
        $magazine = Magazine::find($request->id);

        if (!$magazine) {
            return redirect()->route('magazine.index')->withError('Dergi bulunamadı!');
        }
        $rules = [
            'status_description' => 'required_unless:status_id,'.$magazine->status_id,
            'name' => 'required|max:255',
            //'images' => 'mimes:png|dimensions:min_width=100,min_height=200',
            'images' => 'mimes:png',
        ];
        $messages = [
            'status_description.required_unless' => 'Durum değişiminde durum açıklaması zorunludur.',
            'name.required' => 'Dergi Adı zorunludur.',
            'name.max' => 'Dergi Adı max 255 karakter olmalıdır.',
            'images.mimes' => 'Görsel png olmalıdır.',
            'images.dimensions' => 'Görselin eni min 100, boyu min 200 olmalıdır.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('images')) {
            $image    = $request->file('images');
            $filename = 'magazine-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/magazine/' . $filename);
            Image::make($request->file('images')->getRealPath())->save($path);
            $request['image'] = $filename;
        }
            
        $magazine->update($request->all());

        $request['magazine_id'] = $magazine->id;
        MagazineTransaction::create($request->all());

        return redirect()->route('magazine.index')->with(['success' => 'Güncelleme işleminiz başarılı.']);
    }
    public function delete(Request $request)
    {
        $magazine = Magazine::find($request->id);

        if (!$magazine) {
            return redirect()->route('magazine.index')->withError('Dergi bulunamadı!');
        }

        $magazine->delete();
        
        return redirect()->route('magazine.index')->with(['success' => 'Silme işleminiz başarılı.']);
    }
}