<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titleblock')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" /> <script defer src="{{ mix('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
@include('inc.header')




<div class="container mt-5">

    <div class="row">
        <div class="col-3">
            @if(isset(Auth::user()->name ))
                @if (!(Request::is('login') or Request::is('register')))
                    @include('inc.mytop')
                @endif
            @endif
        </div>
        <div class="col-6" id="app">
            @yield('content')
        </div>
        <div class="col-3">
            @if (!(Request::is('login') or Request::is('register')))
                @include('inc.top')
            @endif
        </div>
    </div>
</div>





@include('inc.footer')
</body>
</html>

