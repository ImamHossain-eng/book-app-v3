@extends('layouts.user')
@section('content')
<body>
    <div class="container">
        <div class="row g-5">
            <div class="col-md-12">
              <h3 class="pb-4 mb-4 fst-italic border-bottom">
                {{$post->user->name}}    
                @if(Auth::check())
                - 
                <span class="text-info">
                  {{Varsity::find($post->user->varsity)->name}}
                 </span>
                @endif            
              </h3>
             
        
              <article class="blog-post">
                <h2 class="blog-post-title">{{$post->book_name}} - <i>{{$post->author}}</i></h2>
                <p class="blog-post-meta">
                    {{ date('F d, Y(D)', strtotime($post->created_at))}} by 
                    <span class="text-info d-inline-block">{{$post->created_at->diffForHumans()}}</span>
                </p>
    
                <hr>
                <p>{!!$post->body!!}</p>
                <hr>
                <strong class="d-inline-block mb-2 text-danger">
                    Contact Details:
                </strong>
                @if(Auth::check())
                <p class="ml-2">
                    <i class="fa fa-phone"></i> 0{{$post->number}}
                </p>
                <p class="ml-2">
                    <i class="fa fa-envelope"></i> {{$post->user->email}}
                </p>
                @else 
                <p class="text-success">Login to get Contact Details</p>
                @endif
                
              </article>
            </div>
            
        </div>
    </div>
</body>
@endsection