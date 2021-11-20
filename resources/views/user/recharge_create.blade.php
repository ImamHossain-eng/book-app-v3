@extends('layouts.user')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3>Pay your current due: {{number_format($due->amount, 2)}} /= BDT</h3>
        </div>
        <div class="card-body">
            <p class="card-text">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Bkash: 01915970075</li>
                    <li class="list-group-item">Nagat: 01915970075</li>
                    <li class="list-group-item">Rocket & Upay: 01915970075</li>
                </ul>
            </p>
            <h6 class="card-sub-title" style="color:rgba(255, 0, 0, 0.753);">
                Send Money to the following Personal Number
            </h6>
            <p class="card-text" style="color:rgba(255, 0, 0, 0.753);">
                Then Submit the form with your Transaction Information
            </p>
            <hr>
            {{Form::open(['route' => 'user.recharge_store', 'method' => 'POST'])}}
            @csrf
            <div class="form-group">
                <input type="number" name="number" class="form-control" placeholder="Sender Mobile Number">
            </div><br>
            <div class="form-group">
                <input type="text" name="amount" class="form-control" placeholder="Recharge Amount: {{number_format($due->amount, 2)}} /= BDT">
            </div><br>
            <div class="form-group">
                <input type="text" name="trans_id" class="form-control" placeholder="Enter the Transaction ID">
            </div><br>
            <div class="form-group">
                <select name="method" id="" class="form-control">
                    <option value="Bkash">Bkash</option>
                    <option value="Nagad">Nagad</option>
                    <option value="Rocket">Rocket</option>
                    <option value="Upay">Upay</option>
                </select>
            </div><br>
            <input type="submit" value="Send Details" class="btn btn-primary">
            {{Form::close()}}
        </div>
    </div>
</body>
@endsection