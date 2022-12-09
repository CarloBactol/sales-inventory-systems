@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('New Order ') }}
                    <a href="{{ url('/order') }}" class="float-right btn btn-sm btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/store-order/') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Customer
                                Name')
                                }}</label>


                            <div class="col-md-6">
                                <select name="customer_name" id="" class="form-control">
                                    <option selected>CUSTOMER:</option>
                                    @foreach ($customer as $c_item)
                                    <option value="{{ $c_item->name }}">{{ $c_item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="customer_order" class="col-md-4 col-form-label text-md-right">{{ __('Customer
                                Order')
                                }}</label>

                            <div class="col-md-6">
                                <select name="customer_order" id="" class="form-control">
                                    <option selected>Product:</option>
                                    @foreach ($product as $p_item)

                                    <option value="{{ $p_item->product_id }}">{!! Str::limit($p_item->product_name,
                                        15, "...") !!} | Price: {{
                                        $p_item->price }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="row mb-3">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity')
                                }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text"
                                    class="form-control @error('quantity') is-invalid @enderror" name="quantity">

                                @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price')
                                }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="">

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="payment_mode" class="col-md-4 col-form-label text-md-right">{{ __('Payment
                                mode')
                                }}</label>

                            <div class="col-md-6">
                                <select name="payment_mode" id="" class="form-control">
                                    <option value="cash">Cash</option>
                                    <option value="installment">Installment</option>
                                </select>

                                @error('payment_mode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount %')
                                }}</label>

                            <div class="col-md-6">
                                <input id="discount" type="text"
                                    class="form-control @error('discount') is-invalid @enderror" name="discount"
                                    value="">

                                @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="penalty" class="col-md-4 col-form-label text-md-right">{{ __('Penalty')
                                }}</label>

                            <div class="col-md-6">
                                <input id="penalty" type="text"
                                    class="form-control @error('penalty') is-invalid @enderror" name="penalty" value="">

                                @error('penalty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="due_date" class="col-md-4 col-form-label text-md-right">{{ __('Paid | Due date')
                                }}</label>

                            <div class="col-md-6">
                                <input id="datepicker" type="text"
                                    class="form-control @error('due_date') is-invalid @enderror" id='due_date'
                                    name="due_date" value="">
                                @error('due_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

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
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
@endsection