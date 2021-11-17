@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h4>Edit Admin</h4>
        </div>
        <div class="card-body">
            {{Form::open(['route' => ['admin.admin_update', $user->id], 'enctype' => 'multipart/form-data'])}}
            {{method_field('PUT')}}
            @csrf
                <div class="form-group">
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Enter Name">
                </div><br>
                <div class="form-group">
                    <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Enter Email">
                </div><br>
                <div class="form-group">
                    <select name="is_admin" id="" class="form-control">
                        <option value="null">Choose User</option>
                        <option value="1">Admin</option>
                        <option value="0">Make Normal User</option>
                    </select>
                </div><br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter New Password / Want Default Password">
                </div><br>
                
                    <input type="hidden" value="{{$user->password}}" name="pass" class="form-control" placeholder="Enter Password">
               
                <input type="submit" value="Save" class="btn btn-primary">
            {{Form::close()}}
        </div>
    </div>
</body>
@endsection