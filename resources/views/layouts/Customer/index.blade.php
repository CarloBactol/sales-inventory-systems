@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Customers ') }}
                    <a href="{{ url('/add-customer') }}" class="float-right btn btn-sm btn-primary">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{!! Str::limit($item->address, 20) !!}</td>
                                <td>
                                    <div class="d-flex ">
                                        <a href="{{ url('edit-customer/'. $item->id) }}"
                                            class="btn btn-sm btn-primary mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('delete-customer/'. $item->id) }}" class=" btn btn-sm
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