<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Joiners;
use App\Http\Requests\JoinerCreateRequest;
use Session;

class FrontendJoinerController extends Controller
{
    public function signupForm(){
        return view('frontend.joiners.signup');
    }
    public function signup(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'lastname' => 'required|min:2|max:255',
            'identity' => 'required|min:11|max:11'
        ]);
        if($validated){
            $checkRegister = Joiners::where('identity', $request->identity)->first();
            if($checkRegister){
                return redirect()->route('joiner.signup.form')->withErrors('Bu katılımcı sistemde kayıtlıdır');
            } else {
                Joiners::create([
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'identity' => $request->identity,
                    'phone' => $request->phone
                ]);
                $request->session()->put('id', $request->identity);
                return redirect()->route('test');
            }
        } else {
            return redirect()->route('joiner.signup.form');
        }
    }

    public function signinForm(){
        return view('frontend.joiners.signin');
    }
    public function signin(Request $request){
        $validated = $request->validate([
            'identity' => 'required|min:11|max:11'
        ]);
        if($validated){
            $checkLogin = Joiners::where('identity', $request->identity)->first();
            if($checkLogin){
                $request->session()->put('joinerid', $checkLogin->id);
                $request->session()->put('name', $checkLogin->name);
                return redirect()->route('test');
            } else {
                return redirect()->route('joiner.signup.form');
            }
        } else {
            return redirect()->route('joiner.signin.form');
        }
    }
}
