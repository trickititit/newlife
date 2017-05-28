<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- START CSS INCLUDE -->
@yield('include_css_lib')
<!-- END CSS INCLUDE -->
</head>
<body class="animated fadeIn">
    <div class="container site-container">
        <header class="site-header">
                <div class="col-md-6">
                    <div class="logo">
                        <img src="{{ asset(config('settings.theme')) }}/img/logo-new.png">
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="contacts">
                        <li><i class="fa fa-mobile fa-2x" aria-hidden="true"></i>
                            9-919-792-07-42</li>
                        <li><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                            г. Волжский</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="block_hello block_content">
                        <p class="block_title">Личный кабинет</p>
                        <span class='col-md-12 login_mp'>Вы вошли как <span class='username_mp'>admin</span></span>
                        <a class="exit_lk" href="{{route("logout")}}" onclick="event.preventDefault();
                            document.getElementById('logout').submit();"><span class="font-icon glyphicon glyphicon-log-out"></span>Выйти</a>
                        {!! Form::open(["url" => route('logout'), 'method' => "POST", "id" => "logout", "style" => "display: none;"]) !!}
                        {!! Form::close() !!}
                        <a href="{{ route("adminIndex") }}" class="enter_lk">В личный кабинет</a>
                    </div>
                </div>
                <div class="col-md-12 margin-top-menu">
                    <nav id="menu">
                        <ul>
                            <li><a href="/">Подобрать жилье</a></li>
                            <li><a href="#">Выбрать банк</a></li>
                            <li><a href="#">Это интересно</a></li>
                            <li><a href="#">О нас</a></li>
                            <li><a href="#">Контакты</a></li>
                        </ul>
                    </nav><!--menu1-->
                </div>
        </header>
        <!-- START CONTENT -->
        @yield('content')
        <!-- END CONTENT -->
        <!-- START CONTENT -->
        @yield('specOffer')
        <!-- END CONTENT -->
    </div>
    <div class="container site-footer">
        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dignissimos ducimus eaque eius fuga minima perferendis saepe! Alias animi consectetur eaque, excepturi magni minima nostrum odit pariatur porro quibusdam, similique.</span>
    </div>
<!-- START MAIN NAVIGATION -->
@yield('navigation')
<!-- END MAIN NAVIGATION -->

<!-- START JS INCLUDE -->
@yield('include_js_lib')
<!-- END JS INCLUDE -->

<!-- START SCRIPT INCLUDE -->
@yield('include_js')
<!-- END SCRIPT INCLUDE -->

<script src="{{ url("js/script") }}"></script>

</body>
</html>