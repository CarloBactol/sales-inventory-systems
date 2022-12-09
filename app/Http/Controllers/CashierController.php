<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Installment;
use Illuminate\Http\Request;

class CashierController extends Controller
{

    public function index()
    {
        return view('cashier-dashboard');
    }



    public function cash()
    {
        $order = Order::where('payment_mode', 'cash')->where('status', 0)->get();
        $product = Product::all();
        return view('layouts.Cashier.cash.cash-order', compact('order', 'product'));
    }
    public function installment()
    {
        $order = Order::where('payment_mode', 'installment')->where('status', 0)->get();
        $product = Product::all();
        return view('layouts.Cashier.installment.installment', compact('order', 'product'));
    }

    public function confirm($id)
    {
        $order = Order::findorFail($id);
        $product = Product::all();
        return view('layouts.Cashier.cash.order-confirm', compact('order', 'product'));
    }
}
