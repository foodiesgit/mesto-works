<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('admin.contact.index', compact('contact'));
    }

    public function create()
    {
        //
    }

    public function store($request)
    {
       //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('contact'));
    }
    public function update(ContactUpdateRequest $request, $id)
    {
        Contact::where('id',$id)->update($request->except(['_method','_token']));
        return redirect()->route('contact.index')->withSuccess('Güncelleme Başarılı');
    }
    public function destroy($id)
    {
        Contact::where('id',$id)->delete();
        return redirect()->route('contact.index')->withSuccess('İletişim Silindi');
    }
}
