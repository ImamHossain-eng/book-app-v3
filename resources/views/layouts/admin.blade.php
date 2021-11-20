<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
 
    <link rel="stylesheet" href="{{asset('css/w3.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
<!--Sidebar-->
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="/" class="w3-bar-item w3-button">Back to Home</a>
  @if(Auth::user()->id==1)
  <a href="/admin/user/admins" class="w3-bar-item w3-button">Manage Admin</a>
  @endif
  @if(Auth::user()->is_admin==1)
  <a href="/admin/users" class="w3-bar-item w3-button">Manage Users</a>
  @endif
  <a href="/admin/varsity" class="w3-bar-item w3-button">University List</a>
  <a href="/admin/book" class="w3-bar-item w3-button">All Books</a>
  <a href="/admin/book/type" class="w3-bar-item w3-button">Books Category</a>
  <a href="/admin/post" class="w3-bar-item w3-button">Post List</a>
  <a href="/admin/recharges" class="w3-bar-item w3-button">Recharge List</a>
  <a href="/admin/feedback" class="w3-bar-item w3-button">Feedbacks</a>
  <div>
        <a class="w3-bar-item w3-button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> 
            {{ csrf_field() }}
        </form>
  </div>
</div>

<div id="main">

<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h3>{{ Auth::user()->name}}</h3>
    <p>{{ Auth::user()->created_at->diffForHumans() }}</p>
  </div>

</div>

<div class="container">
  @include('parts.message')
    @yield('content')
</div>



</div>
</div>
<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>

<!--editor javascript-->
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
		var ckview = document.getElementById("ckview");
		CKEDITOR.replace(ckview,{
			language:'en-gb'
		});
</script>


</body>
</html>