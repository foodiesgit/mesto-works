<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

use Session;
use Validator;

class AuthController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.get.index');
        }
        return view('backend.auth.login');
    }
    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|exists:users',
            'password' => 'required',
        ];
        $messages = [
            'password.required' => 'Şifre zorunludur.',
            'email.required' => 'Email zorunludur.',
            'email.exists' => 'Bu email kayıtlı değil.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.get.index');
        }
        return redirect()->route('admin.get.login')->withError('Şifre yanlış!');
    }
    public function getRegister()
    {
        if (Auth::check()) {
            return redirect()->route('admin.get.index');
        }
        return view('backend.auth.register');
    }
    public function postRegister(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required',
            'is_confirm_ca' => 'required',
        ];
        $messages = [
            'name.required' => 'Ad Soyad zorunludur.',
            'email.required' => 'Email zorunludur.',
            'email.unique' => 'Bu email kayıtlıdır.',
            'phone.required' => 'Telefon zorunludur.',
            'password.required' => 'Şifre zorunludur.',
            'is_confirm_ca.required' => 'Kullanım koşullarını onaylamanız gerekmektedir.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->is_confirm_ca) {
        $request['is_confirm_ca'] = 1;
        }
        
        $credentials = $request->only('email', 'password');
        $request['password'] = Hash::make($request['password']);
        User::create($request->all());

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.get.index');
        }
        return redirect()->route('admin.get.login')->withError('Şifre yanlış!');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.get.login');
    }
}