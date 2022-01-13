<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Magazine;
use App\Models\MagazineDraft;
use App\Models\MagazinePage;
use App\Models\Post;

use Validator;

class MagazinePageController extends Controller
{
    public function index(Request $request)
    {
        $magazine = Magazine::find($request->magazine_id);
        $request->session()->put('magazine', $magazine);
        if (!$magazine) {
            return redirect()->route('magazine.index')->withError('Dergi bulunamadı!');
        }

        $magazinepages = MagazinePage::where('magazine_id', $request->magazine_id)->orderBy('id', 'DESC')->paginate(20)->withQueryString();

        return view('backend.magazinepage.all', compact('magazine', 'magazinepages', 'request'));
    }
    public function create(Request $request)
    {
        $magazine = Magazine::find($request->magazine_id);


        $posts = Post::published()->whereNotIn('id', $magazine->pages()->pluck('post_id'))->orderBy('title')->get();

        /*if ($posts->count() <= 0) {
            return redirect()->route('magazine-page.index', ['magazine_id' => $request->magazine_id])->withError('Yayında olan tüm postlar eklenmiştir.');
        }*/

        $drafts = MagazineDraft::active()->orderBy('name')->get();

        return view('backend.magazinepage.create', compact('drafts', 'magazine', 'posts', 'request'));
    }
    public function store(Request $request)
    {
        $request['magazine_id'] = $request->magazine_id;
        $rules = [
            'magazine_id' => 'required|exists:magazines,id',
            'magazine_draft_id' => 'required|exists:magazine_drafts,id',
            'post_id' => 'required|exists:posts,id',
        ];
        $messages = [
            'magazine_id.required' => 'Dergi seçimi zorunludur.',
            'magazine_id.exists' => 'Seçilen Dergi bulunamadı.',
            'magazine_draft_id.required' => 'Taslak seçimi zorunludur.',
            'magazine_draft_id.exists' => 'Seçilen Taslak bulunamadı.',
            'post_id.required' => 'Post seçimi zorunludur.',
            'post_id.exists' => 'Seçilen Post bulunamadı.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = Post::find($request->post_id);
        $request['title'] = $post->title;
        $request['description'] = $post->description;
        $request['content'] = $post->content;

        $magazinedraft = MagazineDraft::find($request->magazine_draft_id);
        $request['layer_image'] = $magazinedraft->image;

        MagazinePage::create($request->all());

        return redirect()->route('magazine-page.index', ['magazine_id' => $request->magazine_id])->with(['success' => 'Ekleme işleminiz başarılı.']);
    }
    public function edit(Request $request)
    {
        $magazine = Magazine::find($request->magazine_id);

        if (!$magazine) {
            return redirect()->route('magazine.index')->withError('Dergi bulunamadı!');
        }
        $magazinepage = MagazinePage::find($request->id);

        if (!$magazinepage) {
            return redirect()->route('magazine-page.index', ['magazine_id' => $request->magazine_id])->withError('Sayfa bulunamadı!');
        }

        return view('backend.magazinepage.edit', compact('magazine', 'magazinepage', 'request'));
    }
    public function update(Request $request)
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
        $magazine = Magazine::find($request->id);

        if (!$magazine) {
            return redirect()->route('magazine.index')->withError('Dergi bulunamadı!');
        }

        if ($request->hasFile('images')) {
            $image    = $request->file('images');
            $filename = 'magazine-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/magazine/' . $filename);
            Image::make($request->file('images')->getRealPath())->save($path);
            $request['image'] = $filename;
        }

        $magazine->update($request->all());

        return redirect()->route('magazine.index')->with(['success' => 'Güncelleme işleminiz başarılı.']);
    }
    public function delete(Request $request)
    {
        $magazinepage = MagazinePage::find($request->id);

        if (!$magazinepage) {
            return redirect()->route('magazine-page.index', ['magazine_id' => $request->magazine_id])->withError('Sayfa bulunamadı!');
        }

        $magazinepage->delete();

        return redirect()->route('magazine-page.index', ['magazine_id' => $request->magazine_id])->with(['success' => 'Silme işleminiz başarılı.']);
    }
}
