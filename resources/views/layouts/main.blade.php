<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    @guest

    @else
        <div class="row">
            <div class="cpl-lg-12">
                <a href="{{route('profile')}}" class="btn btn-primary my-auto float-right">Profile</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-warning float-right" value="Logout">
                </form>

            </div>
        </div>
    @endguest
    <main class="py-4">
        @yield('content')
    </main>
</div>
<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">UP</a>
        </p>
        <p>Resume Generator</p>
    </div>
</footer>
</body>
</html>
