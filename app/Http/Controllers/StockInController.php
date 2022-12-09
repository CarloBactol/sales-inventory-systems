<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    public function index()
    {
        $stock = StockIn::all();
        $product = Product::all();
        return view('layouts.Stock.index', compact('stock', 'product'));
    }
    public function create()
    {
        $product = Product::all();
        return view('layouts.Stock.add', compact('product'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required| numeric',
        ]);

        if (StockIn::where('quantity', '!=', 0)->where('name', $request->name)->first()) {
            return redirect('/stock')->with("danger", "Product is already have a stock");
        } else {
            StockIn::create($request->all());
            return redirect('/stock')->with("success", "New Stock added successfully");
        }
    }

    public function edit($id)
    {
        $stock = StockIn::findorFail($id);
        $product = Product::all();
        return view('layouts.Stock.edit', compact('stock', 'product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required| numeric',
        ]);

        $new_stock = StockIn::findorFail($id);
        $new_stock->name = $request->name;
        $new_stock->quantity = $request->quantity;
        $new_stock->update();
        return redirect('/stock')->with("info", "Stock updated successfully");
    }


    public function destory($id)
    {
        $stock = StockIn::findorFail($id);
        $stock->delete();
        return redirect('/stock')->with("danger", "Stock deleted successfully");
    }
}
