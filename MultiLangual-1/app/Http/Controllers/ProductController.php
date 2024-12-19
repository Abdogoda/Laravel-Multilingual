<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{

    public function index(){
        $products = Product::all();
        return view("products.index", ['products' => $products]);
    }

    public function create(){
        return view("products.create");
    }

    public function store(StoreProductRequest $request){
        Product::create($request->validated());
        return back()->with('success', __('custome.data_saved_successfully'));
    }

    public function show(Product $product){
        //
    }

    public function edit(Product $product){
        //
    }

    public function update(Request $request, Product $product){
        //
    }

    public function destroy(Product $product){
        //
    }
}