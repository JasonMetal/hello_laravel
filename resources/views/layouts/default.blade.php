<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<title>Sample App</title>--}}
    {{--因此我们接下来要做的就是针对页面标题进行优化，让不同页面显示不同的标题。--}}
    <title>@yield('title','Sample App') - Laravel 新手入门教程</title>
</head>
<body>
    @yield('content')
</body>
</html>