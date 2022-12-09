<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::where('status', 0)->get();
        $product = Product::all();
        return view('layouts.Order.index', compact('order', 'product'));
    }

    public function create(Request $request)
    {
        $product = Product::all();
        $customer = Customer::all();
        return view('layouts.Order.add-order', compact('customer', 'product'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required',
            'quantity' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required',
            'due_date' => 'required',
            'penalty' => 'required',
        ]);
        if (Auth::check()) {
            // DB::table('stock_ins')->decrement('quantity', $request->quantity);
            $count_stock = StockIn::where('quantity', '!=', 0)->count();
            if ($count_stock == 0) {
                return  redirect('add-order')->with('warning', 'No available products stock');
            } else {
                if (StockIn::where('name', $request->customer_order)->where('quantity', '=', 0)->exists()) {
                    return  redirect('add-order')->with('warning', 'Out-of-stock!');
                } elseif (StockIn::where('name', $request->customer_order)->where('quantity', '<=', $request->quantity)->exists()) {
                    $stock = StockIn::where('name', $request->customer_order)->get();

                    foreach ($stock as $item) {
                        $r_stock = $item->quantity;
                    }
                    return  redirect('add-order')->with('warning', 'Stock is running low' . " " . "Available Stocks: " . $r_stock . 'pcs');
                }
            }
        }
        Order::create($request->all());
        return  redirect('order')->with('success', 'New order created successfully');
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $customer = Customer::all();
        $product = Product::all();
        return view('layouts.Order.edit-order', compact('customer', 'order', 'product'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'customer_name' => 'required',

            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'due_date' => 'required',
            'penalty' => 'required|numeric',
            'quantity' => 'required| numeric',
        ]);

        // DB::table('stock_ins')->decrement('quantity', $request->quantity);
        $count_stock = StockIn::where('quantity', '!=', 0)->count();
        if ($count_stock == 0) {
            return  redirect('order')->with('warning', 'No available products stock');
        } else {
            if (StockIn::where('name', $request->customer_order)->where('quantity', '=', 0)->exists()) {
                return  redirect('order')->with('warning', 'Out-of-stock!');
            } elseif (StockIn::where('name', $request->customer_order)->where('quantity', '<=', $request->quantity)->exists()) {
                $stock = StockIn::where('name', $request->customer_order)->get();

                foreach ($stock as $item) {
                    $r_stock = $item->quantity;
                }
                return  redirect('order')->with('warning', 'Stock is running low' . " " . "Available Stocks: " . $r_stock . 'pcs' . ' only!');
            }
        }


        $order = Order::findOrFail($id);
        $order->update($request->all());
        return  redirect('order')->with('info', 'Order updated successfully');
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return  redirect('order')->with('danger', 'Order deleted successfully');
    }
}
