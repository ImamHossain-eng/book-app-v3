@extends('layouts.user')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3>Order List of {{Auth::user()->name}}</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Book ID</th>
                        <th>Book Name</th>
                        <th>Price</th>
                        <th>Order Status</th>
                        <th>Buy Request</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $key => $order)
                        <tr @if($order->status == false) 
                                class="table-warning"
                            @endif>
                            <td> {{$key+1}} </td>
                            <td> {{$order->book_id}} </td>
                            <td> {{Book::find($order->book_id)->name}} </td>
                            <td> {{number_format(Book::find($order->book_id)->price, 2)}} </td>
                            <td>
                                @if($order->status == false)
                                    <h6 style="color:rgba(255, 60, 0, 0.842)">Pending</h6>
                                @elseif($order->status == true)
                                    <h6 style="color:rgba(0, 255, 0, 0.842)">Success</h6>
                                @else
                                <h6 style="color:rgba(89, 0, 255, 0.842)">Processing</h6>
                                @endif
                            </td>
                            <td> {{$order->created_at->diffForHumans()}} </td>
                        </tr>                        
                    @empty
                        <tr>
                            <td colspan="5">
                                <center>No Order Request</center>
                            </td>
                        </tr>                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection