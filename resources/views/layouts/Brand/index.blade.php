@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Brands ') }}
                    <a href="{{ url('create') }}" class="float-right btn btn-sm btn-primary">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Brand Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brand as $brand_item)
                            <tr>
                                <td>{{ $brand_item->name }}</td>
                                <td>
                                    <div class="d-flex ">
                                        <a href="{{ url('brand-edit/'.$brand_item->id) }}"
                                            class=" mx-2 btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/brand-delete/'.$brand_item->id) }}"
                                            class="btn btn-sm btn-danger">
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