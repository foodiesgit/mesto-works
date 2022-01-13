<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Magazine;
use App\Models\Post;

use Carbon\Carbon;

class SiteController extends Controller
{
    public function getIndex(Request $request)
    {
        $categories = Category::active()->tops()->withCount('posts')->orderby('order', 'DESC')->get();
        $recentposts = Post::published()->whereNotNull('slug')->orderBy('published_at', 'DESC')->take(3)->get();

        $indexPosts = Post::published()->showIndex()->whereNotNull('slug')->orderBy('published_at', 'DESC')->take(5)->get();
        $topPosts = Post::published()->whereNotNull('slug')->orderBy('published_at', 'DESC')->take(10)->get();

        $magazines = Magazine::published()->whereNotNull('slug')->orderBy('published_at', 'DESC')->take(4)->get();

        return view('frontend.index', compact('categories', 'indexPosts', 'magazines', 'recentposts', 'topPosts'));
    }
    public function getAbout()
    {
        return view("frontend.about");
    }
    public function getTermsOfUse()
    {
        return view("frontend.terms_of_use");
    }   
    public function getConfidentialityAgreement()
    {
        return view("frontend.confidentiality_agreement");
    }
    public function getContact()
    {
        return view("frontend.contact");
    }    
    public function postContact(Request $request)
    {
        $rules = [
            'name'      => 'required',
            'email'     => 'required',
            'message'   => 'required',
        ];
        $messages = [
            'required' => 'Zorunlu alanları doldurunuz',
        ];
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            return redirect()->back()->with(['errors' => $validation->errors()->all()]);
        } else {
            $data = array (
                'name' => $request->name,
                'email' => $request->email,
                'messagedata' => $request->message
            );
            Mail::send ( 'emailtemplate.contact', $data, function ($message) {
            
                $message->from ( 'info@sitename.com', env('APP_NAME'));
                
                $message->to('merveerbilici@gmail.com')/*->bcc('merveerbilici@gmail.com')*/->subject ( 'İletişim Formu' );
            });

            return redirect()->route('get.contact')->with(['success' => 'Mesajınız başarıyla iletilmiştir.']);
        }
    }

}
