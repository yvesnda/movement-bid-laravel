<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>
<body>
<h1>@yield('title')</h1>
<p>
    @auth
        Logged in as {{\Illuminate\Support\Facades\Auth::user()->name}}
        <ul class="btn-group">
            <li><a href="{{route('home')}}"class="btn btn-primary">Home</a></li>
            <li><a href="{{route('offers.index')}}"class="btn btn-primary">View Available</a></li>
            <li><a href="{{route('offers.create')}}"class="btn btn-primary">Place Offer</a></li>
            <li><a href="{{route('history')}}"class="btn btn-primary">History</a></li>
            <li>
                <a href="{{route('logout')}}" class="btn btn-primary">Logout</a></li>
        </ul>
    @endauth
    @guest
            <a href="{{route('login')}}" class="btn btn-primary">Login</a>
            <a href="{{route('register')}}" class="btn btn-primary">Register</a>
        @endguest
</p>
<div class="container">
    @yield('body')
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>