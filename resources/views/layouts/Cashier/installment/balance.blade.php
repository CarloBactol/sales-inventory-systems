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
                    <a href="{{ url('/installment-transaction') }}" class="float-right btn btn-sm btn-primary"><i
                            class="fas fa-arrow-left "> Back</i></a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/update-payment-balance/'.$balance->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('Put')
                        <input type="hidden" name="id" value="{{ $balance->id }}">
                        <input type="hidden" name="status" value="1">
                        <div class="row mb-3">
                            <label for="customer_name" class="col-md-4 col-form-label text-md-right">{{ __('Customer
                                Name')
                                }}</label>

                            <div class="col-md-6">
                                <input id="customer_name" type="text"
                                    class="form-control @error('customer_name') is-invalid @enderror"
                                    name="customer_name" value="{{ $balance->customer_name }}" autofocus>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="customer_order" class="col-md-4 col-form-label text-md-right">{{
                                __('Order ID')
                                }}</label>

                            <div class="col-md-6">

                                <input id="customer_order" type="text"
                                    class="form-control @error('customer_order') is-invalid @enderror"
                                    name="customer_order" value=" {{ $balance->customer_order }}" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price | ₱')
                                }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                                    value="{{ $balance->price }}" autofocus name="price">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity')
                                }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    value="{{ $balance->quantity }}" autofocus name="quantity">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('Total Pay | ₱')
                                }}</label>

                            @php
                            $total = $balance->quantity * $balance->price;
                            @endphp

                            <div class="col-md-6">
                                <input id="total" name="total_pay" type="text"
                                    class="form-control @error('total') is-invalid @enderror" value="{{ $total }}"
                                    autofocus name="total">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="balance" class="col-md-4 col-form-label text-md-right">{{ __('Old Balance | ₱')
                                }}</label>
                            <div class="col-md-6">
                                <input id="old_balance" type="text"
                                    class="form-control @error('balance') is-invalid @enderror" autofocus name="balance"
                                    value="{{ $balance->balance }}">
                                @error('balance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="new_bal" class="col-md-4 col-form-label text-md-right">{{ __('New Balance | ₱')
                                }}</label>
                            <div class="col-md-6">
                                <input id="new_bal" type="text"
                                    class="form-control @error('new_bal') is-invalid @enderror" autofocus name="new_bal"
                                    value="">
                                @error('new_bal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

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
           var old_balance = $('#old_balance').val()
           var cash_pay = $('#cash_pay').val()

           var total_balance =    old_balance - cash_pay

           $('#new_bal').val(total_balance)

            
         });

       
</script>
@endpush