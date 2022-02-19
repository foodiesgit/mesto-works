<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class FrontendProductsController extends Controller
{
    public function index(){
        $products = Products::get();
        return view('frontend.urunler', compact('products'));
    }
    public function urunlerDetay(Request $req){
        $productDetails = Products::where('id', $req->id)->first();
        return view('frontend.urunler-detay', compact('productDetails'));
    }
}
