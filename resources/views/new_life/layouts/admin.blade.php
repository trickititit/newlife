<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title }}</title>

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
<body class="with-side-menu control-panel control-panel-compact animated fadeIn">

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
                    <a class="btn btn-nav btn-rounded btn-inline btn-default-outline" href="{{route("site.index")}}">
                        На сайт
                    </a>
                    <button type="button" data-toggle="modal" data-target="#addObj" class="btn btn-nav btn-rounded btn-inline btn-success-outline" href="{{route("object.create", ['category' => '4', 'deal' => 'Продажа', 'type' => 'хз'])}}">
                        Добавить объект
                    </button>
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
<!-- Modal -->
<div class="modal fade" id="addObj" tabindex="-1" role="dialog" aria-labelledby="addObjLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="addObjLabel">Выберите тип объекта</h5>
            </div>
            <div class="modal-body clearfix no_padding">
                <div class="menu-td col-md-4 no_padding">
                    <div id="category" class="menu-block">
                        <div class="elem-nav-cat-title">Категория</div>
                        <div id="cat-kvart" data-type="1" data-show="cat-kvart-2" class="elem-nav-cat">Квартира</div>
                        <div id="cat-house" data-type="2" data-show="cat-house-2" class="elem-nav-cat">Дом, дача, участок</div>
                        <div id="cat-komn" data-type="3" data-show="cat-comnt-2" class="elem-nav-cat">Комната</div>
                    </div>
                </div>
                <div class="menu-td col-md-4 no_padding">
                    <div id="cat-sdelka" class="menu-block" style="display: none">
                        <div class="elem-nav-cat-title">Вид сделки</div>
                        <div data-deal="1" class="elem-nav-cat">Продажа</div>
                        <div data-deal="2" class="elem-nav-cat">Обмен</div>
                    </div>
                </div>
                <div id="menu-cat-3" class="menu-td col-md-4 no_padding">
                    <div id="cat-kvart-2" class="menu-block" style="display: none">
                        <div class="elem-nav-cat-title">Тип объекта</div>
                        <a href="" id="kvart-2-1"><div class="elem-nav-cat">Вторичка</div></a>
                        <a href="" id="kvart-2-2"><div class="elem-nav-cat">Новостройка</div></a>
                    </div>
                    <div id="cat-house-2" class="menu-block" style="display: none">
                        <div class="elem-nav-cat-title">Тип объекта</div>
                        <a href="" id="house-2-1"><div class="elem-nav-cat">Дом</div></a>
                        <a href="" id="house-2-2"><div class="elem-nav-cat">Дача</div></a>
                        <a href="" id="house-2-3"><div class="elem-nav-cat">Коттедж</div></a>
                        <a href="" id="house-2-4"><div class="elem-nav-cat">Таунхаус</div></a>
                    </div>
                    <div id="cat-comnt-2" class="menu-block" style="display: none">
                        <div class="elem-nav-cat-title">Тип объекта</div>
                        <a href="" id="comnt-2-1"><div id="comnt-2-1" class="elem-nav-cat">Гостиничного</div></a>
                        <a href="" id="comnt-2-2"><div class="elem-nav-cat">Коридорного</div></a>
                        <a href="" id="comnt-2-3"><div class="elem-nav-cat">Секционного</div></a>
                        <a href="" id="comnt-2-4"><div class="elem-nav-cat">Коммунальная</div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile-menu-left-overlay"></div>
<!-- START MAIN NAVIGATION -->
@yield('navigation')
<!-- END MAIN NAVIGATION -->

<div class="page-content">
    <div class="container">
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
@if (session('search_status'))
    <script>
        $(document).ready(function() {
            $.notify({
                icon: 'font-icon font-icon-check-circle',
                title: '<strong>Результат поиска:</strong>',
                message: 'Найдено {{ session('search_status') }} объекта.'
            }, {
                type: 'success'
            });
        });
    </script>
@endif
@if (session('parse_success') || session('parse_error'))
    <script>
        $(document).ready(function() {
            $.notify({
                icon: 'font-icon font-icon-check-circle',
                title: '<strong>Результат парсинга:</strong>',
                message: 'Добавлено {{ session('parse_success') }} объекта.<br>Ошибок при добавлении {{ session('parse_error') }} объектов'
            }, {
                type: 'success'
            });
        });
    </script>
@endif
@if (session('doparse_error'))
    <script>
        $(document).ready(function() {
            $.notify({
                icon: 'font-icon font-icon-check-circle',
                title: '<strong>Ошибки парсинга:</strong>',
                message: 'Errors: ' + 
                @foreach(session('doparse_error') as $error)
                {{$error}}
                @endforeach
                ,
            }, {
                type: 'error'
            });
        });
    </script>
@endif
<!-- END SCRIPT INCLUDE -->
<script src="{{ asset(config('settings.theme')) }}/js/app.js"></script>
<script src="{{ url("js/script-".$str) }}"></script>
<script>
    $(document).ready(function () {

        $('#cat-kvart, #cat-house, #cat-komn').click(function(){
            var show = $('#cat-sdelka').show(0);
            $('#menu-cat-3 .menu-block').each(function () {
                var show = $(this).css("display");
                if (show == "block") {
                    $(this).hide(0);
                }
            });
        });
        $('#cat-sdelka .elem-nav-cat').click(function(){
            var id_target = $('#category .elem-nav-cat-active').attr('data-show');
            $('#menu-cat-3 .menu-block').each(function () {
                if ($(this).attr('id') == id_target) {
                    $(this).show(0);
                } else {
                    $(this).hide(0);
                }
            });
            88172        });

        $('.elem-nav-cat').click(function () {
            $(this).parent().find('.elem-nav-cat-active').removeClass('elem-nav-cat-active');
            $(this).addClass('elem-nav-cat-active');
        });


        $('#cat-sdelka .elem-nav-cat').click(function () {
            var type = $('#category .elem-nav-cat-active').attr('data-type');
            var deal = $(this).text();
            var site_address = "{{env('APP_URL')}}/";
            $('#kvart-2-1').attr("href", site_address + "admin/object/create/" + type + "/" + deal + "/Вторичка");
            $('#kvart-2-2').attr("href", site_address + "admin/object/create/" + type + "/" + deal + "/Новостройка");
            $('#house-2-1').attr("href", site_address + "admin/object/create/" + type + "/" + deal + "/Дом");
            $('#house-2-2').attr("href", site_address + "admin/object/create/" + type + "/" + deal + "/Дача");
            $('#house-2-3').attr("href", site_address + "admin/object/create/" + type + "/" + deal + "/Коттедж");
            $('#house-2-4').attr("href", site_address + "admin/object/create/" + type + "/" + deal + "/Таунхаус");
            $('#comnt-2-1').attr("href", site_address + "admin/object/create/" + type + "/" + deal + "/Гостиничного");
            $('#comnt-2-2').attr("href", site_address + "admin/object/create/" + type + "/" + deal + "/Коридорного");
            $('#comnt-2-3').attr("href", site_address + "admin/object/create/" + type + "/" + deal + "/Секционного");
            $('#comnt-2-4').attr("href", site_address + "admin/object/create/" + type + "/" + deal + "/Коммунальная");

        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#objects_parse").submit(function() {
            var str = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "/parseAvito",
                data: str,
                async: true,
                timeout: 5000000,
                beforeSend: function () {
                    var clicked = $(".loader").attr("clicked");
                    if(clicked == "true") {
                        var bg = $(".bg");
                        var loader = $(".loader");
                        bg.hide();
                        loader.removeClass("fadeIn");
                        loader.addClass("fadeOut");
                        loader.attr("clicked", "false");
                        loader.hide();
                    } else {
                        var bg = $(".bg");
                        var loader = $(".loader");
                        bg.show();
                        loader.show();
                        loader.removeClass("fadeOut");
                        loader.addClass("fadeIn");
                        loader.attr("clicked", "true");
                    }
                },
                success: function(){

                },
                complete: function(msg) {
                    var clicked = $(".loader").attr("clicked");
                    if(clicked == "true") {
                        var bg = $(".bg");
                        var loader = $(".loader");
                        bg.hide();
                        loader.removeClass("fadeIn");
                        loader.addClass("fadeOut");
                        loader.attr("clicked", "false");
                        loader.hide();
                    } else {
                        var bg = $(".bg");
                        var loader = $(".loader");
                        bg.show();
                        loader.show();
                        loader.removeClass("fadeOut");
                        loader.addClass("fadeIn");
                        loader.attr("clicked", "true");
                    }
                }
            });
            return false;
        });
    });
</script>
</body>
</html>