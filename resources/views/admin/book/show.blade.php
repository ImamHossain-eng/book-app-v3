@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h4>{{$book->name}}</h4>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                   <strong> Created At: </strong>
                    {{ date('F d, Y', strtotime($book->created_at))}}
                    at {{ date('g:ia', strtotime($book->created_at))}}
                </div>
                <div class="col-sm-6">
                    <strong> Updated At: </strong>
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
                    <strong>Author/Writter: </strong>
                    {{$book->author}} <br>
                    <strong>Category: </strong>
                    @if($book->category != 'null')
                    {{Type::find($book->category)->type}}
                    @else None
                    @endif 
                    <br>
                    <strong>Price: </strong>
                    {{number_format($book->price, 2)}} BDT<br>
                    
                    <strong>Contact Number: </strong>
                        0{{$book->number}}<br>
                        <strong>University: </strong>
                        @if($book->varsity !== 0) 
                        {{Varsity::find($book->varsity)->name}}
                        @else 
                        No University Name
                        @endif
                         <br>
                         <br>
                    <!--if statement for confirmed-->
                    <strong>Status: </strong>
                    @if($book->confirmed == true)
                    <span><h6>Published</h6></span>
                    @else 
                    <span><h6>Pending</h6></span>
                    @endif
                    <strong>Uploaded By: </strong>
                    @if($book->user != 0)
                    @if(User::find($book->user)->is_admin == 1)
                    <span><h6>Admin</h6></span>
                    @else 
                    <span><h6>User</h6></span>
                    @endif
                    @endif
                    <strong>Book Description: </strong>
                        <p style="padding-top:0px;">{!!$book->description!!}</p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('/contents/images/book/'.$book->image)}}" alt="{{$book->image}}" style="width:90%;">
                </div>
            </div>
        </div>
    </div>
</body>

@endsection