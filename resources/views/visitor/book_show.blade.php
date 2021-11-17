@extends('layouts.home')
@section('content')
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">{{$book->name}}</h2>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                       <strong> Uploaded At: </strong>
                        {{ date('F d, Y', strtotime($book->created_at))}}
                        at {{ date('g:ia', strtotime($book->created_at))}}
                    </div>
                    <div class="col-sm-6">
                        <strong> Approved At: </strong>
                        {{ date('F d, Y', strtotime($book->updated_at))}}
                        at {{ date('g:ia', strtotime($book->updated_at))}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <strong>Title/Name: </strong>
                        {{$book->name}} <br>
                        <strong>Author/Writer: </strong>
                        {{$book->author}} <br>
                        <strong>Category/Group: </strong>
                        @if($book->category !== 'null') {{Type::find($book->category)->type}} @endif<br>
                        <strong>Price: </strong>
                        {{number_format($book->price, 2)}} /= <br>
                        
                        <strong>University: </strong>
                        @if($book->varsity !== 0) 
                        {{Varsity::find($book->varsity)->name}}
                        @else 
                        No University Name
                        @endif
                         <br>
                        
                        <br>
                        <!--if statement for confirmed-->
                        <strong>Uploaded By: </strong>
                        @if($book->user == 0)
                        <span><h6>Admin</h6></span>
                        @else 
                        <span><h6>User</h6></span>
                        @endif
                        <strong>Book Description: </strong>
                        <p style="padding-top:0px;">{!!$book->description!!}</p>
                        <br>
                        <a href="/user/register" class="btn btn-primary">Contact Info</a>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('/contents/images/book/'.$book->image)}}" alt="{{$book->image}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection