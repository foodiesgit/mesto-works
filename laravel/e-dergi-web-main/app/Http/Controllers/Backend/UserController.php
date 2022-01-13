<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;

use Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::whereNotIn('id', [1, 2])->orderBy('id', 'DESC')->paginate(20)->withQueryString();

        return view('backend.user.all', compact('users', 'request'));
    }
    public function create(Request $request)
    {
        $roles = Role::all();

        return view('backend.user.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'tc' => 'required|max:11|unique:users',
        ];
        $messages = [
            'name.required' => 'Ad Soyad zorunludur.',
            'name.max' => 'Ad Soyad max 255 karakter olmalıdır.',
            'phone.required' => 'Ad Soyad zorunludur.',
            'phone.max' => 'Ad Soyad max 255 karakter olmalıdır.',
            'email.required' => 'Email zorunludur.',
            'email.max' => 'Email max 255 karakter olmalıdır.',
            'email.unique' => 'Bu email kayıtlıdır.',
            'tc.required' => 'TC zorunludur.',
            'tc.max' => 'TC max 255 karakter olmalıdır.',
            'tc.unique' => 'Bu TC kayıtlıdır.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $request['profile_photo'] = 'default.png';
        if ($request->hasFile('profile_photos')) {
            $image    = $request->file('profile_photos');
            $filename = 'user-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/user/' . $filename);
            Image::make($request->file('profile_photos')->getRealPath())->save($path);
            $request['profile_photo'] = $filename;
        }
        $request['password'] = Hash::make($request['password']);
        User::create($request->all());

        return redirect()->route('user.index')->with(['success' => 'Ekleme işleminiz başarılı.']);
    }
    public function edit(Request $request)
    {
        $user = User::whereNotIn('id', [1, 2])->where('id', $request->id)->first();

        if (!$user) {
            return redirect()->route('user.index')->withError('Kullanıcı bulunamadı!');
        }

        $roles = Role::all();

        return view('backend.user.edit', compact('user', 'request', 'roles'));
    }
    public function update(Request $request)
    {
        $user = User::whereNotIn('id', [1, 2])->where('id', $request->id)->first();

        if (!$user) {
            return redirect()->route('user.index')->withError('Kullanıcı bulunamadı!');
        }

        $rules = [
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|nullable|max:255|unique:users,email,'.$request->id,
            'tc' => 'required|nullable|max:11|unique:users,tc,'.$request->id,
        ];
        $messages = [
            'name.required' => 'Ad Soyad zorunludur.',
            'name.max' => 'Ad Soyad max 255 karakter olmalıdır.',
            'phone.required' => 'Ad Soyad zorunludur.',
            'phone.max' => 'Ad Soyad max 255 karakter olmalıdır.',
            'email.required' => 'Email zorunludur.',
            'email.max' => 'Email max 255 karakter olmalıdır.',
            'email.unique' => 'Bu email kayıtlıdır.',
            'tc.required' => 'TC zorunludur.',
            'tc.max' => 'TC max 255 karakter olmalıdır.',
            'tc.unique' => 'Bu TC kayıtlıdır.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('profile_photos')) {
            $image    = $request->file('profile_photos');
            $filename = 'user-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/user/' . $filename);
            Image::make($request->file('profile_photos')->getRealPath())->save($path);
            $request['profile_photo'] = $filename;
        }
        
        if ($request->password == null) {
            $user->update($request->except('password'));
        } else {
            $request['password'] = Hash::make($request['password']);
            $user->update($request->all());
        }

        return redirect()->route('user.index')->with(['success' => 'Güncelleme işleminiz başarılı.']);
    }
    public function delete(Request $request)
    {
        $user = User::whereNotIn('id', [1, 2])->where('id', $request->id)->first();

        if (!$user) {
            return redirect()->route('user.index')->withError('Kullanıcı bulunamadı!');
        }

        $user->delete();
        return redirect()->route('user.index')->with(['success' => 'Silme işleminiz başarılı.']);
    }

    public function getProfile(Request $request)
    {
        $user = Auth::user();

        return view('backend.user.profile', compact('user', 'request'));
    }
    public function postProfile(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|nullable|max:255|unique:users,email,'.$user->id,
            'tc' => 'required|nullable|max:11|unique:users,tc,'.$user->id,
        ];
        $messages = [
            'name.required' => 'Ad Soyad zorunludur.',
            'name.max' => 'Ad Soyad max 255 karakter olmalıdır.',
            'phone.required' => 'Ad Soyad zorunludur.',
            'phone.max' => 'Ad Soyad max 255 karakter olmalıdır.',
            'email.required' => 'Email zorunludur.',
            'email.max' => 'Email max 255 karakter olmalıdır.',
            'email.unique' => 'Bu email kayıtlıdır.',
            'tc.required' => 'TC zorunludur.',
            'tc.max' => 'TC max 255 karakter olmalıdır.',
            'tc.unique' => 'Bu TC kayıtlıdır.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('profile_photos')) {
            $image    = $request->file('profile_photos');
            $filename = 'user-'.time() . '.' . $image->getClientOriginalExtension();
            $path     = public_path('upload/user/' . $filename);
            Image::make($request->file('profile_photos')->getRealPath())->save($path);
            $request['profile_photo'] = $filename;
        }
        
        if ($request->password == null) {
            $user->update($request->except('password'));
        } else {
            $request['password'] = Hash::make($request['password']);
            $user->update($request->all());
        }

        return redirect()->route('get.user.profile')->with(['success' => 'Bilgileriniz güncellendi.']);
    }
}