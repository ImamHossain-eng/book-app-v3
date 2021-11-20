@extends('layouts.user')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3>Due Status of {{Auth::user()->name}}</h3>
            <a href="/user/recharge/create" class="btn btn-primary">Pay Due</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Book Name</th>
                        <th>Book Price</th>
                        <th>Due Amount</th>
                        <th>Status</th>
                        <th>Created_at</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dues as $key => $value)
                        <tr @if($value->status == false) class="table-danger" @endif>
                            <td> {{$key+1}} </td>
                            <td> {{$value->book->name}} </td>
                            <td> {{$value->book->price}} </td>
                            <td> {{$value->amount}} </td>
                            <td>
                                @if($value->status == false)
                                    Unpaid
                                @else 
                                    Paid
                                @endif
                            </td>
                            <td> {{$value->created_at->diffForHumans()}} </td>
                        </tr>
                    @empty 
                        <tr class="table-warning text-center">
                            <td colspan="6">No Due Yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection