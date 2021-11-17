@extends('layouts.user')
@section('content')
    <body>
        <div class="card">
            <div class="card-header">
                <h4>Add New Post</h4>
            </div>
            <div class="card-body">
                {{Form::open(['route'=>'user.post_store', 'method'=>'POST'])}}
                <div class="form-group">
                    <input type="text" name="book_name" class="form-control" placeholder="Enter Book Name">
                </div><br>
                <div class="form-group">
                    <input type="text" name="author" class="form-control" placeholder="Enter Book Author Name">
                </div><br>
                <div class="form-group">
                    <input type="number" name="number" class="form-control" placeholder="Enter Contact Number">
                </div><br>
                <div class="form-group">
                    <textarea name="body" id="ckview" class="form-control"></textarea>
                </div><br>
                <input type="submit" value="Save" class="btn btn-primary">

                {{Form::close()}}
            </div>
        </div>
    </body>
@endsection