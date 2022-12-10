<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Installment;
use Illuminate\Http\Request;
use App\Models\InstallmentHistory;
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
            InstallmentHistory::create($request->all());
        }
        return  redirect('/installment-transaction')->with('success', 'New Payment confirm successfully');
    }

    public function insta_transac()
    {
        $installment = Installment::where('balance_old', '!=', 0)->get();
        return view('layouts.Cashier.installment.installment-transaction', compact('installment'));
    }


    public function update_balance($id)
    {
        $balance = Installment::findOrFail($id);
        $order = Order::where('id', '=', $id)->first();
        return view('layouts.Cashier.installment.balance', compact('balance', 'order'));
    }

    public function update_payment_balance(Request $request, $id)
    {
        $this->validate($request, ['cash_pay' => 'required']);
        $balance = Installment::findOrFail($id);
        $balance->balance_old = $request->input('new_bal');
        if (Auth::check()) {
            InstallmentHistory::create($request->all());
        }
        $balance->update();
        return  redirect('/installment-transaction')->with('info', 'A new payment balance was updated.');
    }

    public function paid_installment()
    {

        $paid = Installment::orderBy('created_at', 'desc')->where('balance_old', 0)->get();
        return view('layouts.Cashier.installment.paid-installment', compact('paid'));
    }

    public function historty_payment()
    {
        $history = InstallmentHistory::all();
        return view('layouts.Cashier.installment.history', compact('history'));
    }
}
