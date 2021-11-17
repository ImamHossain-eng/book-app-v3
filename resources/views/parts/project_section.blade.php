<div class="project_section layout_padding">
    <div class="container">
      <h1 class="partner_text">Register<br> AND LOGIN TO ENJOY</h1>
      <p class="lorem_ipsum_text">
        <i>Used Book Gallary</i>
        <br>
          Sell your old unused book and take another one that you needed.
      </p>
      @if(Auth::check())
        @if(Auth::user()->is_admin == 1)
          <div class="choice_main">
            <div class="choose_bt"><a href="/admin/home">Admin Dashboard</a></div>
          </div>
        @else 
          <div class="choice_main">
            <div class="choose_bt"><a href="/home">User Dashboard</a></div>
          </div>

        @endif  
      @else
          <div class="choice_main">
            <div class="choose_bt"><a href="/user/register">Sign Up Now</a></div>
          </div>    
      @endif        
    </div>
    </div>