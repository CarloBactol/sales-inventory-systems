<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Installment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstallmentController extends Controller
{
    public function payment($id)
    {
        $order = Order::findOrFail($id);
        return view('layouts.Cashier.installment.install-order', compact('order'));
    }

    public function install_confirm(Request $request)
    {
        $this->validate($request, ['cash_pay' => 'required']);
        Installment::create($request->all());
        if (Auth::check()) {
            if (Order::where('id', '=',  $request->id)->exists()) {

                $order = Order::where('id', $request->id)->first();
                $order->status = $request->input('status');
                $order->update();
            }
        }
        return  redirect('/installment-transaction')->with('success', 'New Payment confirm successfully');
    }

    public function insta_transac()
    {
        $installment = Installment::where('balance', '!=', 0)->get();
        return view('layouts.Cashier.installment.installment-transaction', compact('installment'));
    }


    public function update_balance($d)
    {
        $balance = Installment::findOrFail($d);
        return view('layouts.Cashier.installment.balance', compact('balance'));
    }

    public function update_payment_balance(Request $request, $d)
    {
        $this->validate($request, ['cash_pay' => 'required']);
        $balance = Installment::findOrFail($d);
        $balance->balance = $request->input('new_bal');
        $balance->update();
        return  redirect('/installment-transaction')->with('info', 'A new payment balance was updated.');
    }

    public function paid_installment()
    {

        $paid = Installment::orderBy('created_at', 'desc')->where('balance', 0)->get();
        return view('layouts.Cashier.installment.paid-installment', compact('paid'));
    }
}
