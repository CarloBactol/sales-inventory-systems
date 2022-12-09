@extends('layouts.cashier')
@section('content')
@php
$value = "";
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Installment Payment ') }}
                    <a href="{{ url('/cash') }}" class="float-right btn btn-sm btn-primary"><i
                            class="fas fa-arrow-left "> Back</i></a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/install-payment') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <input type="hidden" name="status" value="1">
                        <div class="row mb-3">
                            <label for="customer_name" class="col-md-4 col-form-label text-md-right">{{ __('Customer
                                Name')
                                }}</label>

                            <div class="col-md-6">
                                <input id="customer_name" type="text"
                                    class="form-control @error('customer_name') is-invalid @enderror"
                                    name="customer_name" value="{{ $order->customer_name }}" autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="customer_order" class="col-md-4 col-form-label text-md-right">{{
                                __('Order ID')
                                }}</label>

                            <div class="col-md-6">

                                {{-- @foreach ( $product as $item )

                                @if ($item->product_id == $order->customer_order)
                                <input type="hidden" value="{{ $item->product_name }}">
                                @endif
                                @endforeach --}}

                                <input id="customer_order" type="text"
                                    class="form-control @error('customer_order') is-invalid @enderror"
                                    name="customer_order" value=" {{ $order->customer_order }}" autofocus>
                            </div>
                        </div>
                        @php
                        $percent =$order->discount;
                        $old_price = $order->price;

                        $discount_value = ($old_price / 100) * $percent;

                        $new_price = $old_price - $discount_value;

                        @endphp
                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price | ₱')
                                }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                                    value="{{ $new_price }}" autofocus name="price">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity')
                                }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    value="{{ $order->quantity }}" autofocus name="quantity">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('Total Pay | ₱')
                                }}</label>

                            @php
                            if ($order->discount > 0){
                            $total = $order->quantity * $new_price + $order->penalty;
                            }else{
                            $total = $order->quantity * $order->price + $order->penalty;
                            }
                            @endphp

                            <div class="col-md-6">
                                <input id="total" name="total_pay" type="text"
                                    class="form-control @error('total') is-invalid @enderror" value="{{ $total }}"
                                    autofocus name="total">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="balance" class="col-md-4 col-form-label text-md-right">{{ __('Balance | ₱')
                                }}</label>
                            <div class="col-md-6">
                                <input id="balance" type="text"
                                    class="form-control @error('balance') is-invalid @enderror" autofocus
                                    name="balance">
                                @error('balance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <div class="row mb-3">
                            <label for="cash_pay" class="col-md-4 col-form-label text-md-right">{{ __('Cash Pay | ₱')
                                }}</label>
                            <div class="col-md-6">
                                <input id="cash_pay" type="text"
                                    class="form-control @error('cash_pay') is-invalid @enderror" autofocus
                                    name="cash_pay">
                                @error('cash_pay')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
            $('#table').DataTable();
        } );
        $('input[name=cash_pay]').change(function() { 
           var total = $('#total').val()
           var cash_pay = $('#cash_pay').val()

           var total_balance =    total - cash_pay

           $('#balance').val(total_balance)

            
         });

       
</script>
@endpush