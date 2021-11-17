@extends('layouts.app')
@section('content')
<head>
    <style>
        .ac{
            background:linear-gradient(to bottom, #efefef, #9fe2eb );
            box-shadow: 3px 5px #807d7d;
        }
        .ca{
            background:linear-gradient(to right, #efefef, #dabadf );
        }
        .as{
            padding:1em; background:#efefef;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row g-5">
            <div class="col-md-8 abc"><br>
              <h3 class="pb-4 mb-4 fst-italic border-bottom">
                {{$post->user->name}}                
              </h3>
        
              <article class="blog-post">
                <h2 class="blog-post-title">{{$post->book_name}} - <i>{{$post->author}}</i></h2>
               
                <p class="blog-post-meta">
                    {{ date('F d, Y(D)', strtotime($post->created_at))}} by 
                    <span class="text-info d-inline-block">{{$post->created_at->diffForHumans()}}</span>
                </p>
    
                <hr>
                <div class="as">{!!$post->body!!}</div>
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
            <div class="col-md-4 cba" style="border-left: 1px solid #212121">
                <br>
                <h4>Recent Posts</h4>
                <hr>
                @foreach($posts as $post)
                <p class="mb-2">
                   <a href="/post/{{$post->id}}">
                        <strong class="d-inline-block mb-2 text-info">
                            <h4>{{$post->book_name}}</h4> 
                        </strong>
                    </a> 
                    {{$post->created_at->diffForHumans()}}
                    <hr>
                </p>
                @endforeach
            </div>
        </div>
    </div>
</body>

@endsection