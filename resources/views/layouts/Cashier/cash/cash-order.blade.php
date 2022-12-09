@extends('layouts.cashier')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Cash Orders ') }}
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Customer Order</th>
                                <th>Selling Price</th>
                                <th>Discounted Price</th>
                                <th>Quantity</th>
                                <th>Payment Mode</th>
                                <th>Discount</th>
                                <th>Penalty</th>
                                <th>Due Date</th>
                                <th>Confirm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order_item)
                            @php
                            $percent =$order_item->discount;
                            $old_price = $order_item->price;

                            $discount_value = ($old_price / 100) * $percent;

                            $new_price = $old_price - $discount_value;

                            @endphp
                            <tr>
                                <td>{{ $order_item->id }}</td>
                                <td>{{ $order_item->customer_name }}</td>
                                <td>
                                    @foreach ($product as $item)
                                    {{ $item->product_id == $order_item->customer_order ? $item->product_name : "" }}
                                    @endforeach
                                </td>
                                <td>₱{{ $order_item->price }}</td>
                                <td>₱{{$new_price }}</td>
                                <td>{{ $order_item->quantity }}</td>
                                <td>{{ $order_item->payment_mode }}</td>
                                <td>{{ $order_item->discount}}%</td>
                                <td>+{{ $order_item->penalty }}</td>
                                <td>{{ $order_item->due_date }}</td>
                                <td>
                                    <div class="d-flex ">
                                        <a href="{{ url('order-confirm/'. $order_item->id) }}"
                                            class="btn btn-sm btn-warning mr-2">
                                            <i class="fas fa-edit"></i>
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