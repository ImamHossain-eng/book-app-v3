<div class="our_section layout_padding">
    <div class="container">
      <h1 class="our_text"><strong>Available Books</strong></h1>
      <div class="row padding_top_0">
        @foreach($books as $book)
        <div class="col-lg-4">
          <div class="image_7"><a href="#"><img src="{{asset('/contents/images/book/'.$book->image)}}" style="width:100%;"></a></div>
          <h2 class="design_text">{{$book->name}}</h2>
          <p class="fact_text">
            {{number_format($book->price, 2)}}
          </p>
          <center>
          @if(Auth::check())
          @if(Auth::user()->is_admin==1)
          <a href="/admin/book/{{$book->id}}" class="btn btn-primary">Show Details</a>
          @else
          <a href="/book/{{$book->id}}" class="btn btn-primary">Show Details</a>
          @endif
          @else
          <a href="/book/{{$book->id}}" class="btn btn-primary">Show Details</a>
          @endif
            
          </center>
        </div>
        @endforeach
          <!--<div class="col-lg-4">
            <div class="image_7"><a href="#"><img src="{{asset('contents/images/home/sell_book.jpg')}}"></a></div>
          <h2 class="design_text">Buy Book</h2>
          <p class="fact_text">It is a long established fact that a reader will be distracted by the readable</p>
          </div>
          <div class="col-lg-4">
            <div class="image_7"><a href="#"><img src="{{asset('contents/images/home/sell_book.jpg')}}"></a></div>
          <h2 class="design_text">Exchange Book</h2>
          <p class="fact_text">It is a long established fact that a reader will be distracted by the readable</p>
          </div>-->
          <div class="bt_main">
            <div class="seemore_bt"><a href="/books">See More</a></div>
          </div>
      </div>
      
    </div>
    </div>