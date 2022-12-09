@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Edit Product ') }}
                    <a href="{{ url('/product') }}" class="float-right btn btn-sm btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/update-product/'. $product->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product
                                Type')
                                }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text"
                                    class="form-control @error('product_name') is-invalid @enderror" name="product_name"
                                    value="{{ $product->product_name }}" autofocus>

                                @error('product_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">{{ __('Product ID')
                                }}</label>

                            <div class="col-md-6">
                                <input id="product_id" type="text"
                                    class="form-control @error('product_id') is-invalid @enderror" name="product_id"
                                    value="{{ $product->product_name }}">

                                @error('product_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Brand')}}</label>

                            <div class="col-md-6">
                                <select name="brand" id="" class="form-control">
                                    @foreach ($brand as $b_items)
                                    @if ($product->brand == $b_items->name)
                                    <option selected value="{{ $b_items->name }}">{{ $b_items->name }}</option>
                                    @elseif ($product->brand != $b_items->name)
                                    <option value="{{ $b_items->name }}">{{ $b_items->name }}</option>
                                    @endif
                                    @endforeach
                                </select>

                                @error('brand')
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
                                    name="price" value="{{ $product->price }}">

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Model')
                                }}</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control @error('model') is-invalid @enderror"
                                    name="model" value="{{ $product->model }}">

                                @error('model')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description')
                                }}</label>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control @error('model') is-invalid @enderror"
                                    id="" cols="47" rows="10"
                                    placeholder="Description">{{$product->description }}</textarea>

                                @error('description')
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