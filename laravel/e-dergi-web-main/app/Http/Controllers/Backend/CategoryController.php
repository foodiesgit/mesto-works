<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

use Image;
use Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(20)->withQueryString();

        return view('backend.category.all', compact('categories', 'request'));
    }
    public function create(Request $request)
    {
        $categories = Category::tops()->orderBy('id', 'DESC')->get();

        return view('backend.category.create', compact('categories', 'request'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
        ];
        $messages = [
            'name.required' => 'Kategori Adı zorunludur.',
            'name.max' => 'Kategori Adı max 255 karakter olmalıdır.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('images')) {
            $image    = $request->file('images');
            $filename = 'category-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/category/' . $filename);
            Image::make($request->file('images')->getRealPath())->save($path);
            $request['image'] = $filename;
        }

        Category::create($request->all());

        return redirect()->route('category.index')->with(['success' => 'Ekleme işleminiz başarılı.']);
    }
    public function edit(Request $request)
    {
        $category = Category::find($request->id);

        if (!$category) {
            return redirect()->route('category.index')->withError('Kategori bulunamadı!');
        }
        $categories = Category::tops()->orderBy('id', 'DESC')->get();

        return view('backend.category.edit', compact('categories', 'category', 'request'));
    }
    public function update(Request $request)
    {
        $category = Category::find($request->id);

        if (!$category) {
            return redirect()->route('category.index')->withError('Kategori bulunamadı!');
        }

        if ($request->hasFile('images')) {
            $image    = $request->file('images');
            $filename = 'category-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/category/' . $filename);
            Image::make($request->file('images')->getRealPath())->save($path);
            $request['image'] = $filename;
        }
            
        $category->update($request->all());

        return redirect()->route('category.index')->with(['success' => 'Güncelleme işleminiz başarılı.']);
    }
    public function delete(Request $request)
    {
        $category = Category::find($request->id);

        if (!$category) {
            return redirect()->route('category.index')->withError('Kategori bulunamadı!');
        }

        $category->delete();
        
        return redirect()->route('category.index')->with(['success' => 'Silme işleminiz başarılı.']);
    }
}