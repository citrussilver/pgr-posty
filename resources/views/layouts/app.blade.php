<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posty</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class=" dartpad-theme">
    <nav class="p-6 flex justify-between mb-6 dartpad-nav-theme dartpad-boxshade">
        <ul class="flex items-center">
            <li><a href="/" class="p-3">Home</a></li>
            <li><a href="{{ route('dashboard') }}" class="p-3">Dashboard</a></li>
            <li><a href="{{ route('posts') }}" class="p-3">Post</a></li>
        </ul>
        <ul class="flex items-center">
            @auth
                <li class="nav-img"><img src="{{ asset(auth()->user()->img_location) }}" alt="face_img" class="contain-image"></li>
                <li><a href="" class="p-3">{{ auth()->user()->username }}</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="p-3">Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li><a href="{{ route('login') }}" class="p-3">Login</a></li>
                <li><a href="{{ route('register') }}" class="p-3">Register</a></li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>