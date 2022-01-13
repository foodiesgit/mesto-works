<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;

use Validator;
use SEO;

class PostController extends Controller
{
	public function getAll(Request $request)
	{
		$category = null;
		
		$post_data = Post::published()->whereNotNull('slug')->orderby('published_at','DESC');
		if ($request->search) {
			$post_data = $post_data->where(function($query) use ($request) {
							$query->orWhere('title', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%')->orWhere('content', 'like', '%' . $request->search . '%');
						});
		}
		if ($request->category_slug) {
			$category = Category::where('slug', $request->category_slug)->first();

			if ($category) {
				$post_data = $post_data->whereHas('categories', function (Builder $query) use ($category) {
					$query->where('category_id', $category->id);
				});
			}
		}
		$posts = $post_data->paginate(20);


		$categories = Category::active()->tops()->withCount('posts')->orderby('order', 'DESC')->get();
		$recentposts = Post::published()->whereNotNull('slug')->orderBy('published_at', 'DESC')->take(3)->get();

		return view("frontend.post.all", compact('category', 'posts', 'categories', 'recentposts', 'request'));
	}

	public function getDetail(Request $request)
	{
		$post = Post::where('slug', $request->slug)->first();

		if ($post == TRUE) {

			$categories = Category::active()->whereNotNull('slug')->tops()->withCount('posts')->orderby('order', 'DESC')->get();
			$recentposts = Post::published()->whereNotNull('slug')->where('id', '!=', $post->id)->orderBy('published_at', 'DESC')->take(3)->get();

			$next = Post::published()->whereNotNull('slug')->where('id', '>', $post->id)->first();
			$previous = Post::published()->whereNotNull('slug')->where('id', '<', $post->id)->first();

			return view("frontend.post.detail", compact('post', 'categories', 'previous', 'next', 'recentposts'));
		} else {
			return redirect()->back();
		}
	}
	public function getAuthorDetail(Request $request)
	{
		$category = null;
		$author = User::where('slug', $request->slug)->withCount(['posts' => function (Builder $query) {
			    $query->published()->whereNotNull('slug');
			}])->first();

		if (!$author) {
			return redirect()->route('get.index');
		}
		
		$post_data = Post::published()->whereNotNull('slug')->where('created_by', $author->id)->orderby('published_at','DESC');
		if ($request->search) {
			$post_data = $post_data->orWhere('title', 'like', '%' . $request->search . '%')->orWhere('content', 'like', '%' . $request->search . '%');
		}
		/*if ($request->category_slug == TRUE) {
			$category = Category::where('slug', $request->category_slug)->first();

			if ($category) {
				$post_data = $post_data->whereHas('categories', function (Builder $query) use ($category) {
					$query->where('category_id', $category->id);
				});
			}
		}*/
		$posts = $post_data->paginate(20);


		$categories = Category::active()->tops()->withCount('posts')->orderby('order', 'DESC')->get();
		$recentposts = Post::published()->whereNotNull('slug')->orderBy('published_at', 'DESC')->take(3)->get();

		return view("frontend.post.author", compact('author', 'category', 'posts', 'categories', 'recentposts', 'request'));
	}
    public function likePost(Request $request)
    {
        $like = Like::where('ip', request()->ip())->where('user_agent', request()->userAgent())->where('post_id', $request->post_id)->first();

        if ($like) {
            return redirect()->back()->with(['success' => 'Beğeniniz alınmıştır.']);
        }

        Like::create($request->all());
        return redirect()->back()->with(['success' => 'Beğeniniz alınmıştır.']);
    }
}