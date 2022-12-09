@extends('layouts.cashier')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Cash Transactions ') }}
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Product ID</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Pay</th>
                                <th>Cash Pay</th>
                                <th>Change</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cash_trans as $item)
                            <tr>
                                <td>{{ $item->customer_name }}</td>
                                <td>{{ $item->customer_order }}</td>
                                {{-- <td>
                                    @foreach ($product as $item)
                                    {{ $item->product_id == $item->customer_order ? $item->product_name : "" }}
                                    @endforeach
                                </td> --}}
                                <td>₱{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->total_pay }}</td>
                                <td>{{ $item->cash_pay }}</td>
                                <td>{{ $item->change }}</td>
                                <td>
                                    <span class="badge bg-success px-2">PAID</span>
                                    {{-- <div class="d-flex ">
                                        <a href="{{ url('edit-order/'. $item->id) }}"
                                            class="btn btn-sm btn-primary mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('delete-order/'. $item->id) }}" class=" btn btn-sm
                                            btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div> --}}
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