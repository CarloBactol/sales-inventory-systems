@extends('layouts.cashier')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Installment History ') }}
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Month(2)</th>
                                <th>Penalty</th>
                                <th>Total Pay</th>
                                <th>Balance</th>
                                <th>Breaks Pay</th>
                                <th>Cash Pay</th>
                                <th class="text-center">Date Pay</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $item)
                            <tr class="text-center">
                                <td>{{ $item->customer_order }}</td>
                                <td>{{ $item->customer_name }}</td>
                                <td>₱{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->total_month }} {{ $item->total_month == '1' ? 'month' : 'months' }}</td>
                                <td>₱{{ $item->penalty }}</td>
                                <td>₱{{ $item->total_pay }}</td>
                                <td>₱{{ $item->balance }}</td>
                                <td>₱{{ $item->break_pay }}</td>
                                <td>₱{{ $item->cash_pay }}</td>
                                <td>{{ $item->created_at->format('jS F Y h:i:s A') }}</td>
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