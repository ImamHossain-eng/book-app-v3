@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h3>Post Index</h3>
        </div>
        <div class="card-body">
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
                            <td> {{$post->user_id}} </td>
                            <td> {{$post->book_name}} </td>
                            <td> 0{{$post->number}} </td>
                            <td> {{$post->created_at}} </td>
                            <td>
                                <a href="/admin/post/{{$post->id}}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                {{Form::open(['method'=>'DELETE', 'style'=>'display:inline;', 'route'=>['admin.post_destroy', $post->id]])}}
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
        {{$posts->links()}}
    </div>
</body>

@endsection