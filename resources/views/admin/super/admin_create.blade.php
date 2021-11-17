@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h4>Adding Admin</h4>
        </div>
        <div class="card-body">
            {{Form::open(['route' => 'admin.admin_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                </div><br>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div><br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                </div><br>
                <input type="submit" value="Save" class="btn btn-primary">
            {{Form::close()}}
        </div>
    </div>
</body>
@endsection