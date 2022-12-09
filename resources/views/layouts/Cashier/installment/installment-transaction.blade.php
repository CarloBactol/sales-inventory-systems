@extends('layouts.cashier')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Installment Transactions ') }}
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
                                <th>Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($installment as $item)
                            <tr>
                                <td>{{ $item->customer_name }}</td>
                                <td>{{ $item->customer_order }}</td>
                                <td>₱{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>₱{{ $item->total_pay }}</td>
                                <td>₱{{ $item->balance }}</td>
                                <td>
                                    <a href="{{ url('update-balance/'. $item->id) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-edit"></i></a>
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