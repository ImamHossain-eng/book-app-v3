@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h4>Edit User</h4>
        </div>
        <div class="card-body">
            {{Form::open(['route' => ['admin.user_update', $user->id], 'method' => 'POST'])}}
            {{method_field('PUT')}}
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Name">
            </div><br>
            <div class="form-group">
                <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Name">
            </div><br>
            <div class="form-group">
                <select name="config" class="form-control">
                    <option value="null">Choose Status</option>
                    <option value="1">Unregistered</option>
                    <option value="0">Register</option>

                </select>
            </div><br>
            <input type="submit" value="Save" class="btn btn-primary">
            {{Form::close()}}
        </div>
    </div>
</body>
@endsection