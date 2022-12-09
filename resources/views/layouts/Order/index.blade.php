@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Order ') }}
                    <a href="{{ url('/add-order') }}" class="float-right btn btn-sm btn-primary">Add New</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Customer Order</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Payment Mode</th>
                                <th>Discount</th>
                                <th>Penalty</th>
                                <th>Paid | Due Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order_item)

                            <tr>
                                <td>{{ $order_item->id }}</td>
                                <td>{{ $order_item->customer_name }}</td>
                                <td>
                                    @foreach ($product as $item)
                                    {{ $item->product_id == $order_item->customer_order ? $item->product_name : "" }}
                                    @endforeach
                                </td>
                                <td>₱{{ $order_item->price }}</td>
                                <td>{{ $order_item->quantity }}</td>
                                <td>{{ $order_item->payment_mode }}</td>
                                <td>{{ number_format($order_item->discount, 2) }}%</td>
                                <td>+{{ $order_item->penalty }}</td>
                                <td>{{ $order_item->due_date }}</td>
                                <td>
                                    <div class="d-flex ">
                                        <a href="{{ url('edit-order/'. $order_item->id) }}"
                                            class="btn btn-sm btn-primary mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('delete-order/'. $order_item->id) }}" class=" btn btn-sm
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