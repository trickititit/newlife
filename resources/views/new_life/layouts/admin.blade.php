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
    <link href="{{ asset(config('settings.theme')) }}/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="{{ asset(config('settings.theme')) }}/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="{{ asset(config('settings.theme')) }}/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="{{ asset(config('settings.theme')) }}/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="{{ asset(config('settings.theme')) }}/img/favicon.png" rel="icon" type="image/png">
    <link href="{{ asset(config('settings.theme')) }}/img/favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- START CSS INCLUDE -->
    @yield('include_css_lib')
    <!-- END CSS INCLUDE -->
</head>
<body class="with-side-menu control-panel control-panel-compact">

<header class="site-header">
    <div class="container-fluid">
        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="{{ asset(config('settings.theme')) }}/img/logo-2.png" alt="">
            <img class="hidden-lg-up" src="{{ asset(config('settings.theme')) }}/img/logo-2.png" alt="">
        </a>

	        <span id="show-hide-sidebar" class="checkbox-toggle">
	            <input type="checkbox" id="show-hide-sidebar-toggle" checked>
	            <label for="show-hide-sidebar-toggle"></label>
	        </span>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset(config('settings.theme')) }}/img/avatar-2-64.png" alt="">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="{{route("user.edit", ['user'=>$user->id])}}"><span class="font-icon glyphicon glyphicon-user"></span>Профиль</a>
                            <a class="dropdown-item" href="{{ route("settings.edit") }}"><span class="font-icon glyphicon glyphicon-cog"></span>Настройки</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route("logout")}}" onclick="event.preventDefault();
                            document.getElementById('logout').submit();"><span class="font-icon glyphicon glyphicon-log-out"></span>Выйти</a>
                            {!! Form::open(["url" => route('logout'), 'method' => "POST", "id" => "logout", "style" => "display: none;"]) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div><!--.site-header-shown-->
            </div><!--site-header-content-in-->
        </div><!--.site-header-content-->
    </div><!--.container-fluid-->
</header><!--.site-header-->

<div class="mobile-menu-left-overlay"></div>
<!-- START MAIN NAVIGATION -->
@yield('navigation')
<!-- END MAIN NAVIGATION -->

<div class="page-content">
    <div class="container-fluid">
        @if (count($errors) > 0)
            <div class="form-error-text-block">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
        <!-- START CONTENT -->
            @yield('content')
        <!-- END CONTENT -->
    </div><!--.container-fluid-->
</div><!--.page-content-->
<!-- START JS INCLUDE -->
@yield('include_js_lib')
<!-- END JS INCLUDE -->
<style type="text/css">
#YMapsID {
    width: 100%;
    height: 400px;
}
</style>
<!-- START SCRIPT INCLUDE -->
@yield('include_js')
@if (session('status'))
    <script>
    $(document).ready(function() {
        $.notify({
            icon: 'font-icon font-icon-check-circle',
            title: '<strong>Успешно</strong>',
            message: '{{ session('status') }}'
        }, {
            type: 'success'
        });
    });
    </script>
@endif
<!-- END SCRIPT INCLUDE -->
<script src="{{ asset(config('settings.theme')) }}/js/app.js"></script>
</body>
</html>