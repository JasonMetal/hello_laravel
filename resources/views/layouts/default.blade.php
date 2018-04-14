<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<title>Sample App</title>--}}
    {{--因此我们接下来要做的就是针对页面标题进行优化，让不同页面显示不同的标题。--}}
    <title>@yield('title','Sample App') - Laravel 入门教程</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
{{--<header class="navbar navbar-fixed-top navbar-inverse">--}}
{{--<div class="container">--}}
{{--<div class="col-md-offset-1 col-md-10">--}}
{{--<a href="/" id="logo">Sample App</a>--}}
{{--<nav>--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li><a href="/help">帮助</a></li>--}}
{{--<li><a href="#">登录</a></li>--}}
{{--</ul>--}}
{{--</nav>--}}
{{--</div>--}}
{{--</div>--}}
{{--</header>--}}
@include('layouts._header')
    <div class="container">
        <div class="col-md-offset-1 col-md-10">
            @include('shared._messages')
            @yield('content')
            @include('layouts._footer')
        </div>
    </div>
</body>
</html>