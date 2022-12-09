<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('layouts.Customer.index', compact('customer'));
    }

    public function create(Request $request)
    {
        $product = Product::all();
        return view('layouts.Customer.add-customer', compact('product'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);
        Customer::create($request->all());
        return  redirect('customer')->with('success', 'New Customer created successfully');
    }

    public function edit($id)
    {
        $customer = Customer::findorFail($id);
        return view('layouts.Customer.edit-customer', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);
        $customer = Customer::findorFail($id);
        $customer->name = $request->input('name');
        $customer->phone_number = $request->input('phone_number');
        $customer->address = $request->input('address');
        $customer->update();
        return  redirect('customer')->with('info', 'Customer updated successfully');
    }

    public function delete($id)
    {
        $customer = Customer::findorFail($id);
        $customer->delete();
        return  redirect('customer')->with('danger', 'Customer deleted successfully');
    }
}
