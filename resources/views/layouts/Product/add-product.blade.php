@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('New Product ') }}
                    <a href="{{ url('/product') }}" class="float-right btn btn-sm btn-primary">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/store-product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product
                                Name')
                                }}</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text"
                                    class="form-control @error('product_name') is-invalid @enderror" name="product_name"
                                    value="{{ old('product_name') }}" autofocus>

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
                                    value="{{ time(). 'PRD' }}">

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
                                    @foreach ($brand as $brand_item)
                                    <option value="{{ $brand_item->name }}">{{ $brand_item->name }}</option>
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
                                    name="price">

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
                                    name="model">

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
                                    id="" cols="47" rows="10" placeholder="Description"></textarea>

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