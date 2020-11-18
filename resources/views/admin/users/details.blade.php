@extends('admin.layouts.master')

@section('page')

    User Order Details

@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">{{ $orders[0]->user->name }} Orders Details</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Address </th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                            <tr>

                                <td>{{ $order->id }}</td>

                                <td>
                                    @foreach ($order->products as $item)
                                        <table class="table">
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                            </tr>
                                        </table>
                                    @endforeach
                                </td>

                                <td>
                                    @foreach ($order->orderItem as $item)
                                        <table class="table">
                                            <tr>
                                                <td>{{ $item->quantity }}</td>
                                            </tr>
                                        </table>
                                    @endforeach
                                </td>

                                <td>
                                    @foreach ($order->orderItem as $item)
                                        <table class="table">
                                            <tr>
                                                <td>Rs. {{ $item->price }}</td>
                                            </tr>
                                        </table>
                                    @endforeach
                                </td>

                                <td>{{ $order->address }}</td>
                                <td>{{ $order->date }}</td>
                                <td>
                                    @if($order->status)
                                        <span class="label label-success">Confirmed</span>
                                    @else
                                        <span class="label label-warning">Pending</span>
                                    @endif
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<a href="{{ url('/admin/users') }}" class="btn btn-success">Back to users</a>


@endsection