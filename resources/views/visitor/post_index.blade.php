@extends('layouts.app')
@section('content')
<head>
  <style>
    .abc{
      background: #EFEFEF;
      box-shadow: 2px 5px #313131;
    }
    
  </style>
</head>
<body>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                {{Form::open(['route'=>'post.search', 'method'=>'POST'])}}
                <input type="text" class="form-control" name="book" placeholder="Search by Book or Author Name">
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" style="width:70%;"><i class="fa fa-search"></i> Search</button>
                {{Form::close()}}
            </div>
        </div>   
    
        <div class="row mb-2">
            @forelse ($posts as $post)
            <div class="col-md-6">
              <div class="row abc g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-success">{{$post->user->name}}
                    @if(Auth::check())
                     - <span class="text-info">
                       {{Varsity::find($post->user->varsity)->name}}
                      </span>
                      @endif
                    </strong> 
                  <h3 class="mb-0">{{$post->book_name}}</h3>
                  <div class="mb-1 text-muted">{{$post->author}}</div>
                  <p class="card-text mb-auto"><i class="fa fa-clock-o"></i> {{$post->created_at->diffFOrHumans()}}</p>
                  <div class="mb-1 text-muted as">
                     
                  </div>
                  <a href="/post/{{$post->id}}" class="stretched-link btn btn-primary">Show Details</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                  <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        
                </div>
              </div>
            </div>
            @empty
            <div class="container-fluid">
               <div class="row mb-2 text-center" style="justify-content:center;">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-danger">
                      No Post Found
                    </h4>
                  </div>
                  <div class="card-body">
                    Coming Soon
                  </div>
                </div>
               </div>
            </div>
                
            @endforelse
        
            {{$posts->links()}}
          </div>
    </div>
</body>
  @endsection