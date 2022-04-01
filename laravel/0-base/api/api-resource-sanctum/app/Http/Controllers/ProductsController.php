<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Requests\ProductsCreateRequest;
use App\Http\Requests\ProductsUpdateRequest;

class ProductsController extends Controller
{
    public function index()
    {
        $getProducts = Products::all();
        if($getProducts->count() < 1){
            return response()->json(['message' => 'Data not found!'],200);
        }
        return Products::all();
        // return response()->json(Products::all());
        // return Products::all(['name']);
    }

    public function store(ProductsCreateRequest $request)
    {
        return Products::create($request->all());
    }

    public function show($id)
    {
        $detailsProduct = Products::find($id);
        if(is_null($detailsProduct)){
            return response()->json(['message' => 'Data not found!'],200);
        }
        return Products::find($id);
    }

    public function update(ProductsUpdateRequest $request, $id)
    {
        $updateProduct = Products::find($id);
        if(is_null($updateProduct)){
            return response()->json(['message' => 'Data not found!'],200);
        }
        return $updateProduct->update($request->all());
    }

    public function destroy($id)
    {
        $destroyProduct = Products::find($id);
        if(is_null($destroyProduct)){
            return response()->json(['message' => 'Data not found!'],200);
        }
        return Products::destroy($id);
    }

    public function search($name)
    {
        $searchProducts = Products::where('name', 'LIKE', '%'.$name.'%')->get();
        if($searchProducts->count() < 1){
            return response()->json(['message' => 'Data not found!'],200);
        }
        return Products::where('name', 'LIKE', '%'.$name.'%')->get();
    }
}
