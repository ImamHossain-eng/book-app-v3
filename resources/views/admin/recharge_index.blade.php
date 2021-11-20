@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3>Recharge Request List</h3>
        </div>
        <div class="card-body">
            <table class="table-stripe table table-bordered">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>User Name</th>
                        <th>Sender Number</th>
                        <th>Amount</th>
                        <th>Transaction ID</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Requested at</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recharges as $key => $item)
                        <tr @if($item->confirmed == false) class="table-danger" @endif>
                            <td> {{$key+1}} </td>
                            <td> {{$item->user->name}} </td>
                            <td> {{$item->number}} </td>
                            <td> {{$item->amount}} </td>
                            <td> {{$item->trans_id}} </td>
                            <td> {{$item->method}} </td>
                            <td>
                                @if($item->confirmed == false)
                                    Pending
                                @else 
                                    Confirmed 
                                @endif
                            </td>
                            <td> {{$item->created_at->diffForHumans()}} </td>
                            <td>
                                @if($item->confirmed == false)
                                {{Form::open(['route'=>['admin.recharge_update', $item->id], 'method'=>'PUT'])}}
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-check"></i>
                                    </button>
                                {{Form::close()}}
                                @endif
                            </td>
                        </tr>
                    @empty 
                        <tr class="table-danger text-center">
                            <td colspan="9">No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection