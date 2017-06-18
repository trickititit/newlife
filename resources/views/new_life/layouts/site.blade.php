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
                        @if (Auth::guest())
                            <a class="exit_lk" href="{{ route('register') }}"><span class="font-icon glyphicon glyphicon-log-out"></span>Регистрация</a>
                            <a href="{{ route('login') }}" class="enter_lk">Войти</a>
                        @else
                            <span class='col-md-12 login_mp'>Вы вошли как <span class='username_mp'>{{ Auth::user()->name }}</span></span>
                            <a class="exit_lk" href="{{route("logout")}}" onclick="event.preventDefault();
                            document.getElementById('logout').submit();"><span class="font-icon glyphicon glyphicon-log-out"></span>Выйти</a>
                            {!! Form::open(["url" => route('logout'), 'method' => "POST", "id" => "logout", "style" => "display: none;"]) !!}
                            {!! Form::close() !!}
                            <a href="{{ route("adminIndex") }}" class="enter_lk">В личный кабинет</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 margin-top-menu">
                    <nav id="menu">
                        <ul>
                            <li><a id="go_catalog">Подобрать жилье</a></li>
                            <li><a href="#">Выбрать банк</a></li>
                            <li><a href="#">Это интересно</a></li>
                            <li><a href="#">О нас</a></li>
                            <li><a href="#">Контакты</a></li>
                        </ul>
                    </nav><!--menu1-->
                </div>
        </header>
        <!-- MODAL -->
        <div id="modal" class="iziModal" data-izimodal-title="Подобрать объект">
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

@if (session('search_status') > 0)
    <script>
        $(document).ready(function() {
            $('#cat_search_result').iziModal({title: 'По вашему запросу найдено: {{ session('search_status') }} объекта(ов).', headerColor: '#228b0c', attached: 'bottom', timeout: 5000, timeoutProgressbar: true, timeoutProgressbarColor: 'rgba(255,255,255,0.5)'});
            $('#cat_search_result').iziModal('open');
        });
    </script>
@elseif (session('search_status') == 0)
    <script>
        $(document).ready(function() {
            $('#cat_search_result').iziModal({title: 'По вашему запросу ничего не найдено.', headerColor: '#BD5B5B', attached: 'bottom', timeout: 5000, timeoutProgressbar: true, timeoutProgressbarColor: 'rgba(255,255,255,0.5)'});
            $('#cat_search_result').iziModal('open');
        });
    </script>
@endif

<script>
    $(document).ready(function() {
        $('#modal').iziModal({headerColor: '#228b0c'});
        $("#go_catalog").click(function(){
            $('#modal').iziModal('open');
        });
    });
</script>

<script src="{{ url("js/script-".$str) }}"></script>

</body>
</html>