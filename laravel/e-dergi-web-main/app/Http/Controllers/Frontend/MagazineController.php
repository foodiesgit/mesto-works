<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Like;
use App\Models\Magazine;

use Validator;
use SEO;

class MagazineController extends Controller
{
	public function getAll(Request $request)
	{
		$category = null;
		
		$magazine_data = Magazine::published()->whereNotNull('slug')->orderby('published_at','DESC');
		if ($request->search) {
			$magazine_data = $magazine_data->where(function($query) use ($request) {
							$query->orWhere('title', 'like', '%' . $request->search . '%')->orWhere('description', 'like', '%' . $request->search . '%')->orWhere('content', 'like', '%' . $request->search . '%');
						});
		}
		$magazines = $magazine_data->paginate(20);


		$recentposts = null;
		//$recentposts = Magazine::published()->whereNotNull('slug')->orderBy('published_at', 'DESC')->take(3)->get();

		return view("frontend.magazine.all", compact('magazines', 'recentposts', 'request'));
	}

	public function getDetail(Request $request)
	{
		$magazine = Magazine::where('slug', $request->slug)->first();

		if ($magazine == TRUE) {

			$next = Magazine::published()->whereNotNull('slug')->where('id', '>', $magazine->id)->first();
			$previous = Magazine::published()->whereNotNull('slug')->where('id', '<', $magazine->id)->first();

			return view("frontend.magazine.detail", compact('magazine', 'previous', 'next'));
		} else {
			return redirect()->back();
		}
	}
    public function likeMagazine(Request $request)
    {
        $like = Like::where('ip', request()->ip())->where('user_agent', request()->userAgent())->where('magazine_id', $request->magazine_id)->first();

        if ($like) {
            return redirect()->back()->with(['success' => 'Beğeniniz alınmıştır.']);
        }

        Like::create($request->all());
        return redirect()->back()->with(['success' => 'Beğeniniz alınmıştır.']);
    }
}