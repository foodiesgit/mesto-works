<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostImage;
use App\Models\PostTransaction;
use App\Models\Situation;
use App\Models\User;

use App\Notifications\MailForChangedPostStatus;

use Image;
use Validator;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('likes')->orderBy('id', 'DESC')->paginate(20)->withQueryString();

        $categories = Category::orderBy('name')->get();
        $situations = Situation::post()->orderBy('name')->get();

        return view('backend.post.all', compact('categories', 'posts', 'request', 'situations'));
    }
    public function create(Request $request)
    {
        $categories = Category::tops()->orderBy('name')->get();

        return view('backend.post.create', compact('categories', 'request'));
    }
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'slider_image' => 'required',
            'content' => 'required',
        ];
        $messages = [
            'title.required' => 'Başlık zorunludur.',
            'title.max' => 'Başlık max 255 karakter olmalıdır.',
            'content.required' => 'Başlık zorunludur.',
            'slider_image.required' => 'Slider resmi yülenmesi zorunludur.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('slider_image')) {
            $image    = $request->file('slider_image');
            $filename = 'post-'.time() .rand(1,9999) . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/post/slider/' . $filename);
            Image::make($request->file('slider_image')->getRealPath())->save($path);
            $request['image'] = $filename;
        }else{
            $request['image'] = 'post-1623849557.png';
        }

        $request['post_id'] = Post::create($request->all())->id;
        PostTransaction::create($request->all());

        if ($request->category_ids) {
            //$post->categories()->delete();
            foreach ($request->category_ids as $category_id) {
                $request['category_id'] = $category_id;
                PostCategory::create($request->all());
            }
        }

        return redirect()->route('post.edit', ['id' => $request->post_id])->with(['success' => 'Ekleme işleminiz başarılı.']);
    }
    public function edit(Request $request)
    {
        $post = Post::find($request->id);

        if (!$post) {
            return redirect()->route('post.index')->withError('Post bulunamadı!');
        }

        $categories = Category::tops()->orderBy('name')->get();

        $transactions = PostTransaction::where('post_id', $request->id)->orderBy('id', 'DESC')->get()->groupBy(function($item) {
                return $item->created_at->format('Y-m-d');
            });
        $situations = Situation::post()->orderBy('name')->get();

        return view('backend.post.edit', compact('categories', 'post', 'request', 'situations', 'transactions'));
    }
    public function update(Request $request)
    {
        $post = Post::find($request->id);

        if (!$post) {
            return redirect()->route('post.index')->withError('Post bulunamadı!');
        }

        $rules = [
            'status_description' => 'required_unless:status_id,'.$post->status_id,
            'title' => 'required|max:255',
            'content' => 'required',
        ];
        $messages = [
            'status_description.required_unless' => 'Durum değişiminde durum açıklaması zorunludur.',
            'title.required' => 'Başlık zorunludur.',
            'title.max' => 'Başlık max 255 karakter olmalıdır.',
            'content.required' => 'Başlık zorunludur.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::user()->role->slug == 'author') {
            $request['status_id'] = 1;
        } else {
            $request['status_id'] = $request->status_id;
        }

        if ($request->status != $post->status_id) {
            $users = User::where('role_id', 2)->orWhere('id', $post->created_by)->get();
            Notification::send($users, new MailForChangedPostStatus($post));
        }

        $post->update($request->all());

        $request['post_id'] = $post->id;
        PostTransaction::create($request->all());

        if ($request->category_ids) {
            if ($post->categories->count() > 0 ) {
                $post->categories()->delete();
            }
            foreach ($request->category_ids as $category_id) {
                $request['category_id'] = $category_id;
                PostCategory::create($request->all());
            }
        }

        return redirect()->back()->with(['success' => 'Güncelleme işleminiz başarılı.']);
    }
    public function delete(Request $request)
    {
        $post = Post::find($request->id);

        if (!$post) {
            return redirect()->route('post.index')->withError('Post bulunamadı!');
        }

        $post->delete();

        return redirect()->route('post.index')->with(['success' => 'Silme işleminiz başarılı.']);
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('images')) {
            $image    = $request->file('images');
            $filename = 'post-'.time() .rand(1,9999) . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/post/' . $filename);
            Image::make($request->file('images')->getRealPath())->save($path);
            $request['image'] = $filename;

            PostImage::create($request->all());
            return response()->json(['success'=> $filename]);
        }

        return response()->json(['error'=> 'Eklenemedi']);
    }
    public function deleteImage(Request $request)
    {
        $postimage = PostImage::find($request->id);

        if (!$postimage) {
            return redirect()->route('post.edit', ['id' => $request->post_id])->withError('Görsel bulunamadı!');
        }

        $postimage->delete();

        return redirect()->route('post.edit', ['id' => $request->post_id])->with(['success' => 'Silme işleminiz başarılı.']);
    }
    public function editShow(Request $request)
    {
        $post = Post::find($request->id);

        if (!$post) {
            return redirect()->route('post.index')->withError('Post bulunamadı!');
        }

        $post->update([$request->show => $request->is_active]);

        return redirect()->back()->with(['success' => 'Güncelleme işleminiz başarılı.']);
    }
}
