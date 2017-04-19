<section class="box-typical box-panel">
    <header class="box-typical-header">
        <div class="tbl-row">
            <div class="tbl-cell tbl-cell-title">
                <h3 id="h3-create-obj">Создание нового объекта</h3> <button id="upload-img" class="btn btn-primary clearfix" data-toggle="modal" data-target="#myModal">
                    Загрузить изображения
                </button>
            </div>
        </div>
    </header>
    <div class="box-typical-body">
        <form id="objCreate" action="\admin" method="get" class="form-wizard">
            <div>
                <h3>Тип, город, район</h3>
                <section>
                    <div class="form-group">
                        <label for="objType">Тип Недвижимости</label>
                        <select class="form-control" id="objType" name="obj_type">
                            <option value="1">Квартира</option>
                            <option value="2">Дом, Дача, Таунхаус</option>
                            <option value="3">Комната</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="objDeal">Тип сделки</label>
                        <select name="objDeal" class="form-control" required>
                            <option value="Продажа">Продажа</option>
                            <option selected value="Обмен">Обмен</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div id="obj_form_1">
                            <label for="obj_form_1">Тип обьекта</label>
                            <select name="obj_form_1" class="form-control" >
                                <option value="Вторичка">Вторичка</option>
                                <option value="Новостройка">Новостройка</option>
                            </select>
                        </div>
                        <div id="obj_form_2" hidden>
                            <label for="obj_form_2">Тип обьекта</label>
                            <select name="obj_form_2" class="form-control">
                                <option value="Дом">Дом</option>
                                <option value="Дача">Дача</option>
                                <option value="Коттедж">Коттедж</option>
                                <option value="Таунхаус">Таунхаус</option>
                            </select>
                        </div>
                        <div id="obj_form_3" hidden>
                            <label for="obj_form_3">Тип обьекта</label>
                            <select name="obj_form_3" class="form-control">
                                <option value="Гостиничного">Гостиничного</option>
                                <option value="Коридорного">Коридорного</option>
                                <option value="Секционного">Секционного</option>
                                <option value="Коммунальная">Коммунальная</option>
                            </select>
                        </div>
                    </div>
                    <div id="objCity" class="form-group">
                        <label for="obj_city">Город</label>
                        <select name="obj_city" class="form-control" required>
                            @foreach($cities as $city)
                                @if($city->name == 'Волжский')
                            <option selected value="{{$city->id}}">{{$city->name}}</option>
                                @else
                            <option value="{{$city->id}}">{{$city->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        @foreach($cities as $city)
                            @if($city->name == 'Волжский')
                                <div id="objArea{{$city->id}}">
                                    <label for="objArea{{$city->id}}">Район</label>
                                    <select name="objArea{{$city->id}}" class="form-control" required>
                                        @foreach($city->areas as $area)
                                            <option value="{{$area->id}}">{{$area->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div id="objArea{{$city->id}}" hidden>
                                    <label for="objArea{{$city->id}}">Район</label>
                                    <select name="objArea{{$city->id}}" class="form-control" required>
                                        @foreach($city->areas as $area)
                                            <option value="{{$area->id}}">{{$area->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
                <h3>Адрес</h3>
                <section>
                    <div id="search_address" class="form-group">
                        <div class="hero-unit">

                                <div class="row-fluid">
                                    <div id="adr-search" class="form-search">
                                        <div class="control-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="search-query" placeholder="Что искать...">
                                                          <span class="input-group-btn">
                                                            <button id="search-map" class="btn btn-secondary" type="submit">Найти</button>
                                                          </span>
                                                    </div>
                                                <span class="help-inline invisible">Пожалуйста исправьте ошибку в этом поле</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div id="YMapsID" class="span8"></div>
                                </div>

                        </div>
                        <input name="obj_geo" id="obj_geo" type="text" readonly hidden/>
                        <div id="address">
                            <label for="obj_address">Адрес</label>
                            <input type="text" name="obj_address" id="obj_address" class="form-control"  aria-describedby="adrHelp" required>
                            <small id="adrHelp" class="form-text text-muted">Можно поменять сформировавшийся адрес.</small>
                        </div>
                    </div>
                </section>
                <h3>Hints</h3>
                <section>

                </section>
                <h3>sdfsdfsdf</h3>
                <section>

                </section>

            </div>
        </form>
    </div><!--.box-typical-body-->
</section>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Загрузка изображений</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('adminObjUplImg')}}" name="image" class="dropzone" id="my-dropzone">
                    {{ csrf_field() }}
                    <input id="obj-id" name="obj_id" value="{{$obj_id}}" type="text" hidden >
                    <input id="tmp-img" name="tmp_img" value="1" type="text" hidden >
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
