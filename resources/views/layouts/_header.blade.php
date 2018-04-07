
{{--/*--}}
{{--*   * author:metal--}}
{{--*   * createtime: 2018/4/7/007 14:34--}}
{{--*   * description:--}}
{{--*/--}}

<header class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="col-md-offset-1 col-md-10">
            <a href="{{route('home')}}" id="logo">Sample App</a>
            <nav>
                <ul class="nav navbar-nav navbar-right">
                    {{--<li><a href="/help">帮助</a></li>--}}
                    {{--优化 --}}
                    <li><a href="{{route('help')}}">帮助</a></li>
                    <li><a href="#">登录</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>