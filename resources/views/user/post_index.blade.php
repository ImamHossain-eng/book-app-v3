@extends('layouts.user')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3>Post Index</h3>
        </div>
        <div class="card-body">
            
            <div class="row mb-2">
                <div class="col-md-5">
                    <a href="/user/post/create" class="btn btn-primary" style="width:90%;">Add New Post</a>
                </div>
                <div class="col-md-5">
                    <a href="/posts" class="btn btn-primary" style="width:90%;">Show All Posts</a>
                </div>
            </div>
            <br>
            <table class="table table-striped table-bordered table-responsive">
              
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Post User</th>
                        <th>Book Name</th>
                        <th>Contact Number</th>
                        <th>Created_at</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $key => $post)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$post->user->name}} </td>
                            <td> {{$post->book_name}} </td>
                            <td> 0{{$post->number}} </td>
                            <td> {{$post->created_at}} </td>
                            <td>
                                <a href="/user/post/{{$post->id}}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="/user/post/{{$post->id}}/edit" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </a>
                                {{Form::open(['method'=>'DELETE', 'style'=>'display:inline;', 'route'=>['user.post_destroy', $post->id]])}}
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                {{Form::close()}}
                            </td>
                        </tr>
                    @empty 
                    <tr class="table-warning text-center">
                        <td colspan="6">No Post</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
     
    </div>
</body>

@endsection