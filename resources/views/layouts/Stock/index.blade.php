@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Stocks ') }}
                    <a href="{{ url('/add-stock') }}" class="float-right btn btn-sm btn-primary">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($stock as $item)
                            <tr>

                                <td>
                                    @foreach ($product as $p_item)
                                    @if ($item->name == $p_item->product_id)
                                    {{ $p_item->product_name }}
                                    @endif

                                    @endforeach
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <div class="d-flex ">
                                        <a href="{{ url('edit-stock/'.$item->id) }}" class=" mx-2 btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('delete-stock/'.$item->id) }}" class="btn btn-sm btn-danger">
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