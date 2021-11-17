@extends('layouts.app')
@section('content')
<body>
    <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::open(['route' => 'book.filter', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
                            <div class="form-group">
                                <select name="varsity" class="form-control btn btn-outline-primary">
                                    <option value="null">Choose University</option>
                                    @foreach($varsities as $varsity)
                                    <option value="{{$varsity->id}}"> {{$varsity->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="type" class="form-control btn btn-outline-primary">
                                    <option value="null">Choose Book Category</option>
                                    @foreach($types as $type)
                                    <option value="{{$type->id}}"> {{$type->type}} </option>
                                    @endforeach
                                </select>
                            </div>              
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Filter" class="btn btn-outline-primary" style="width:100%;">
                            {{Form::close()}}  
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    {{Form::open(['route'=>'book.search', 'method'=> 'POST'])}}
                    @csrf
                    <input type="text" name="search" class="form-control" placeholder="Search by Book or Author">
                </div>
                <div class="col-md-3">
                    <input type="submit" value="Search" class="btn btn-outline-primary" style="width:100%;">
                </div>
        </div>


        <div class="row">
            @forelse($books as $key => $book)
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{asset('/contents/images/book/'.$book->image)}}" alt="Card image cap">
                    <div class="card-body">
                        <h1 class="card-title">{{$book->name}}</h1>
                        <h4 class="card-subtitle mb-2 text-muted">{{$book->author}}</h4>
                        <p class="card-text">{{$book->created_at->diffForHumans()}}</p>
                    </div>
                    <ul class="list-group list-group-flush"  style="background: #EFEFEF;">
                        <li class="list-group-item">Price: {{number_format($book->price, 2)}}</li>
                        <li class="list-group-item">Group: 
                            @if($book->category !== 'null') 
                            {{Type::find($book->category)->type}}
                            @else 
                            No Type
                            @endif
                        </li>
                        <li class="list-group-item">
                            @if($book->varsity !== 0) 
                            {{Varsity::find($book->varsity)->name}}
                            @else 
                            No University Name
                            @endif
                        </li>
                      </ul>
                      <div class="card-body">
                    @if(Auth::check())
                        @if(Auth::user()->is_admin==1)
                        <a href="/admin/book/{{$book->id}}" class="btn btn-primary" style="padding: 1em;">Show Details</a>
                        @else
                        <a href="/book/{{$book->id}}" class="btn btn-primary" style="padding: 1em;">Show Details</a>
                        @endif
                    @else
                        <a href="/book/{{$book->id}}" class="btn btn-primary" style="padding: 1em;">Show Details</a>
                    @endif                                        

                      </div>
                 </div>
            </div>
            @empty
                <div class="card" style="margin:auto;">
                    <div class="card-header">
                        No Contents Found
                    </div>
                    <div class="card-body">
                        Coming Soon
                    </div>
                </div>
            @endforelse
        </div>
        <br>
        {{$books->links()}}
        <br>
    </div>
</body>

@endsection