<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titleblock')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/prettify.css" >
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" /> <script defer src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}


</head>
<body>
@include('inc.header')




<div class="container mt-5">

    <div class="row">
        <div class="col-3">
            @if(isset(Auth::user()->name ))
                @if (!(Request::is('login') or Request::is('register') or Request::is('search')))
                    @include('inc.mytop')
                @endif
            @endif
        </div>
        <div class="col-6" id="app">
            @yield('content')
        </div>
        <div class="col-3">
            @if (!(Request::is('login') or Request::is('register') or Request::is('search')))
                @include('inc.top')
            @endif
        </div>
    </div>
</div>





@include('inc.footer')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Подключаем скрипт бутстрапа: -->
<!-- Подключаем скрипт для подсветки кода: -->
<script src="/js/prettify.js"></script>
<!-- Инициализация функции подсветки кода: -->
<script type="text/javascript">
    !function ($) {
        $(function(){
            window.prettyPrint && prettyPrint()
        })
    }(window.jQuery)
</script>
</body>
</html>

