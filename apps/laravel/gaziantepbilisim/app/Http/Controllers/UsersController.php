<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UsersCreateRequest $request)
    {
        $checkUser = User::where('email',$request->email)->get();
        if(count($checkUser) > 0){
            return redirect()->route('users.index')->withErrors('Bu Kullanıcı Sistemde Kayıtlı');
        } else {
            $request->merge(['password' => Hash::make($request->password)]);
            User::create($request->post());
            return redirect()->route('users.index')->withSuccess('Kullanici Başarıyla Oluşturuldu');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::find($id) ?? abort('404', 'Kullaınıcı Bulunamadı');
        return view('admin.users.edit', compact('users'));
    }
    public function update(UsersUpdateRequest $request, $id)
    {
        User::where('id',$id)->update($request->except(['_method','_token']));
        return redirect()->route('users.index')->withSuccess('Kullanıcı Güncellendi');
    }
    public function destroy($id)
    {
        $getRole = User::where('id',$id)->first();
        if(Auth::id() == $id || $getRole->role == 'admin'){
            return redirect()->route('users.index')->withErrors('Bunu Silme Yetkiniz Yoktur');
        } else {
            User::where('id',$id)->delete();
            return redirect()->route('users.index')->withSuccess('Kullanıcı Silindi');
        }
    }
}
