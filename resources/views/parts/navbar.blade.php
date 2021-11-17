<div class="header_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="logo">
                    <a href="/">
                        <img src="{{asset('contents/images/home/logo.png')}}" style="height:3em;width:3em;border-radius:50%;">
                        <h2 style="color:#EFEFEF;display:inline;margin-top:5px;">Used Book Gallary</h2>
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="menu_text">
                    <ul>
                        <li><a href="/">HOME</a></li>                                                    
                    
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="/books">AVAILABLE BOOKS</a></li>
                        <li><a href="/posts">POST</a></li>
                        <li><a href="/contact">CONTACT US</a></li>
                        @if(Auth::check())
                            @if(Auth::user()->is_admin == 1)
                            <li><a href="/admin/home">ADMIN DASHBOARD</a></li>
                            @else
                            <li><a href="/home">USER DASHBOARD</a></li>
                            @endif
                        @else
                            <li><a href="/login">LOGIN</a></li>
                        @endif
                        
                        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
              <a href="/">HOME</a>
              <a href="#">ABOUT</a>
              <a href="/user/book/create">Sell BOOK</a>
              <a href="/user/books">Buy BOOK</a>
              <a href="/contact">CONTACT US</a>
              <a href="/login">LOGIN</a>
              <a href="/register">REGISTER</a>
            </div>
            </div>
            <span  style="font-size:33px;cursor:pointer; color: #ffffff; visibility: hidden;" onclick="openNav()"><img src="{{asset('contents/images/modules/toggle.png')}}" class="toggle_menu"></span>
            </div>  
            </li>
                    </ul>
                </div>
        </div>
    </div>
  </div>