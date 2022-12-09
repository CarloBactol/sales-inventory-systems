<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use App\Models\CashPayment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CashPaymentController extends Controller
{
    public function payment(Request $request)
    {
        $this->validate($request, ['cash_pay' => 'required']);
        if (Auth::check()) {
            // DB::table('stock_ins')->decrement('quantity', $request->quantity);
            if (StockIn::where('name', $request->customer_order)->where('quantity', '!=', 0)->exists()) {
                // StockIn::where('id', $request->customer_order)->decrement('quantity', $request->quantity);
                DB::table('stock_ins')->where('name', $request->customer_order)->decrement('quantity', $request->quantity);
            } else {
                return  redirect('add-order')->with('warning', 'Out-of-stock!');
            }

            if (Order::where('id', '=',  $request->id)->exists()) {

                $order = Order::where('id', $request->id)->first();
                $order->status = $request->input('status');
                $order->update();
            }
        }
        CashPayment::create($request->all());
        return  redirect('cashier')->with('success', 'New Payment confirm successfully');
    }

    public function transaction()
    {
        $cash_trans =  CashPayment::where('status', 1)->get();
        return  view('layouts.Cashier.cash.cash-transaction', compact('cash_trans'));
    }
}
