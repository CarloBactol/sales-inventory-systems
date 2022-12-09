@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('New Stock ') }}
                    <a href="{{ url('/stock') }}" class="float-right btn btn-sm btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/store-stock') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product
                                ID')
                                }}</label>

                            <div class="col-md-6">
                                <input type="text" nam="product_id" id="product_id" class="form-control">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product
                                Name')
                                }}</label>

                            <div class="col-md-6">
                                <select name="name" id="p_id" class="form-control">
                                    <option selected>PRODUCTS:</option>
                                    @foreach ($product as $item)
                                    <option value="{{ $item->product_id }}">{{ $item->product_name }}</option>
                                    @endforeach
                                </select>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="hidden" value="0" name="product_id" id="product_id">
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
            $('#table').DataTable()
        
          $('select').on('change',function (e) { 
                var opt = $(this).find(":selected").val()
                var product_id = $('#product_id').val(opt)
            //    var data = JSON.stringify(product_id)
            });
     } )
        
</script>
<script>
</script>
@endpush