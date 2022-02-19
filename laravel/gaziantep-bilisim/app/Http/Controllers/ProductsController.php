<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductsCreateRequest;
use App\Http\Requests\ProductsUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Products;
class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(ProductsCreateRequest $request)
    {
        $checkProduct = Products::where('title',$request->title)->get();
        if(count($checkProduct) > 0){
            return redirect()->route('products.index')->withErrors('Bu Ürün Sistemde Kayıtlı');
        } else {
            if($request->hasFile('image')){
                $fileName = 'upload/products/'.$request->title.'.'.$request->image->extension();
                $request->image->move(public_path('/upload/products'), $fileName);
                $request->merge(['image' => $fileName]);
            }
            if($request->hasFile('imagedetail')){
                $fileName = 'upload/products/details/'.$request->title.'.'.$request->imagedetail->extension();
                $request->imagedetail->move(public_path('/upload/products/details'), $fileName);
                $request->merge(['imagedetail' => $fileName]);
            }
            Products::create($request->post());
            return redirect()->route('products.index')->withSuccess('Yeni Ürün Başarı ile Oluşturuldu');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $products = Products::find($id);
        return view('admin.products.edit', compact('products'));
    }
    public function update(ProductsUpdateRequest $request, $id)
    {
        $fileName = 'upload/products/'.$request->title.'.'.$request->image->extension();
        $fileNameDetail = 'upload/products/details/'.$request->title.'.'.$request->image->extension();

        $request->image->move(public_path('/upload/products'), $fileName);
        $request->imagedetail->move(public_path('/upload/products/details'), $fileName);
        Products::where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $fileName,
            'imagedetail' => $fileNameDetail
        ]);
        return redirect()->route('products.index')->withSuccess('Güncelleme Başarılı');
    }
    public function destroy($id)
    {
        $deleteProduct =  Products::where('id', $id)->first();
        Products::where('id',$id)->delete();
        if($deleteProduct->image){
            unlink($deleteProduct->image);
        }
        if($deleteProduct->imagedetail){
            unlink($deleteProduct->imagedetail);
        }
        return redirect()->route('products.index')->withSuccess('Ürün Silindi');
    }
}
