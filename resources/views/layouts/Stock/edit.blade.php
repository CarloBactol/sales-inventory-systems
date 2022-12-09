@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Update Stock ') }}
                    <a href="{{ url('/stock') }}" class="float-right btn btn-sm btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/update-stock/' .$stock->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product
                                Name')
                                }}</label>

                            <div class="col-md-6">
                                <select name="name" id="" class="form-control">
                                    @foreach ($product as $item)
                                    @if ($stock->name == $item->product_id)
                                    <option selected value="{{ $item->product_id }}">{{ $item->product_name }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity')
                                }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text"
                                    class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                    value="{{ $stock->quantity }}">

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
                                    {{ __('Update') }}
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