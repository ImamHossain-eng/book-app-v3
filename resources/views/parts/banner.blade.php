<div class="banner_section layout_padding">
    <div id="my_Controls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="banner_taital">
              <h1 class="find_text">FIND EVERYTHING YOU NEED</h1>
              <h2 class="crush_text">We Are Proffesional Enough to Offer You</h2>
            </div>
            <div class="contact">
              <div class="contact_bt"><a href="/contact">Contact Us</a></div>
            </div>
          </div>
        </div>

        @foreach($boks as $bok)
    <div class="carousel-item">
    <div class="container">
      <div class="banner_taital">
        <h1 class="find_text">{{$bok->name}}</h1>
        <h2 class="crush_text">{{$bok->author}}</h2>
        <p class="long_text">{{$bok->created_at->diffForHumans()}}</p>
      </div>
      <div class="contact">
        <div class="contact_bt"><a href="/book/{{$bok->id}}">Show Details</a></div>
      </div>
    </div>
    </div>
    @endforeach

    </div>
    <a class="carousel-control-prev" href="#my_Controls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true">
        <!--<i class="fa fa-arrow-right" style="margin-top:-20px;color:#03164C;" aria-hidden="true"></i>-->
    </span>
    <span class="sr-only"></span>
    </a>
    <a class="carousel-control-next" href="#my_Controls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"></span>
    </a>
    </div>
    
    </div>