@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Products ') }}
                    <a href="{{ url('/add-product') }}" class="float-right btn btn-sm btn-primary">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Model</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $prod_items)
                            <tr>
                                <td>{{ $prod_items->product_id }}</td>
                                <td>{{ $prod_items->product_name }}</td>
                                <td>{{ $prod_items->brand }}</td>
                                <td>{{ $prod_items->price }}</td>
                                <td>{{ $prod_items->model }}</td>
                                <td>{!! Str::limit($prod_items->description, 40) !!}</td>
                                <td>
                                    <div class="d-flex ">
                                        <a href="{{ url('edit-product/'. $prod_items->id) }}"
                                            class="btn btn-sm btn-primary mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('delete-product/'. $prod_items->id) }}" class=" btn btn-sm
                                            btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
</script>
@endpush