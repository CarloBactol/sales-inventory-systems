<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('layouts.Product.index', compact('products'));
    }
    public function show()
    {
        $brand = Brand::all();
        return view('layouts.Product.add-product', compact('brand'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_id' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required||numeric|gt:0',
            'description' => 'required',
        ]);
        $data = $request->all();
        Product::create($data);
        return  redirect('product')->with('success', 'New Product created successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brand = Brand::all();
        return  view('layouts.Product.edit-product', compact('product', 'brand'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_id' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required||numeric|gt:0',
            'description' => 'required',
        ]);
        $product = Product::findOrFail($id);
        $product->product_name = $request->input('product_name');
        $product->product_id = $request->input('product_id');
        $product->brand = $request->input('brand');
        $product->price = $request->input('price');
        $product->model = $request->input('model');
        $product->description = $request->input('description');
        $product->update();
        return  redirect('product')->with('info', 'New Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return  redirect('product')->with('danger', 'Product deleted successfully');
    }
}
