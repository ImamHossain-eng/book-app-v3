@extends('layouts.user')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h4>Book Index</h4>
        </div>
        <div class="card-body">
            <a href="/user/book/create" class="btn btn-primary">Add New Book</a>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Group/Area/Category</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $key => $book)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$book->name}} </td>
                            <td> {{$book->author}} </td>
                            <td> {{$book->price}} </td>
                            <td>@if($book->category != 'null') 
                                {{Type::find($book->category)->type}} 
                                @else 
                                None
                                @endif
                            </td>
                            <td>
                                @if($book->confirmed == 1)
                                Published
                                @elseif($book->confirmed == 0)
                                Pending
                                @else 
                                Undefine
                                @endif
                            </td>
                            <td> {{$book->created_at->diffForHumans()}} </td>
                            <td>
                                <a href="/user/book/{{$book->id}}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                                
                                <a href="/user/book/{{$book->id}}/edit" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </a>
                                {{Form::open(['method'=>'DELETE', 'route'=>['user.book_destroy',$book->id],'style'=>'display:inline;']) }}
                                <button type="submit" style="display:inline;" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                {{Form::close()}}
                                
                            </td>
                        </tr>
                    @empty
                        <tr class="table-warning">
                            <td colspan="8">
                                <center>Coming Soon</center>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{$books->links()}}
        </div>
    </div>
</body>
@endsection