@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h4>Add New Category for Books</h4>
        </div>
        <div class="card-body">
            {{Form::open(['route' => 'admin.type_store', 'method' => 'POST'])}}
                <div class="form-group">
                    <input type="text" name="type" class="form-control" placeholder="Enter the name of the Category">
                </div>
                <br>
                <input type="submit" value="Save" class="btn btn-primary">

            {{Form::close()}}
        </div>
    </div>
</body>

@endsection