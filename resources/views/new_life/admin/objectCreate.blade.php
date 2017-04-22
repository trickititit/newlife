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
        {!! Form::open(["url" => route("adminObjectCreate"), "class" => "form-wizard", 'method' => "POST", "id" => "objCreate"]) !!}
            <div>
                <h3>Тип, город, район</h3>
                <section>
                    <div class="form-group">
                        <label for="obj_type">Тип Недвижимости</label>
                        {!! Form::select('obj_type', $inputs["obj_type"],isset($object->category) ? $object->category  : old('obj_type'), ["class" => "form-control", "id" => "obj_type"]) !!}
                    </div>
                    <div class="form-group">
                        <label for="obj_deal">Тип сделки</label>
                            {!! Form::select('obj_deal', $inputs["obj_deal"],isset($object->deal) ? $object->deal  : old('obj_deal'), ["class" => "form-control", "id" => "obj_deal"]) !!}
                    </div>
                    <div class="form-group">
                        <div id="obj_form_1">
                            <label for="obj_form_1">Тип обьекта</label>
                            {!! Form::select('obj_form_1', $inputs["obj_form_1"],isset($object->category) ? (($object->category == 1) ? $object->type : ""): old('obj_form_1'), ["class" => "form-control"]) !!}
                        </div>
                        <div id="obj_form_2" style="display: none;">
                            <label for="obj_form_2">Тип обьекта</label>
                            {!! Form::select('obj_form_2', $inputs["obj_form_2"],isset($object->category) ? (($object->category == 2) ? $object->type : ""): old('obj_form_2'), ["class" => "form-control"]) !!}
                        </div>
                        <div id="obj_form_3" style="display: none;">
                            <label for="obj_form_3">Тип обьекта</label>
                            {!! Form::select('obj_form_3', $inputs["obj_form_3"],isset($object->category) ? (($object->category == 3) ? $object->type : ""): old('obj_form_3'), ["class" => "form-control"]) !!}
                        </div>
                    </div>
                    <div id="obj_city" class="form-group">
                        <label for="obj_city">Город</label>
                        {!! Form::select('obj_city', $inputs["obj_city"],  isset($object->gorod) ? $object->gorod->id : old("obj_city", 2), ["class" => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        @foreach($cities as $city)
                            @if($city->name == 'Волжский')
                                <div id="obj_area{{$city->id}}">
                                    <label for="obj_area{{$city->id}}">Район</label>
                                    {!! Form::select('obj_area'.$city->id, $inputs["obj_area".$city->id], isset($object->gorod) ? (($object->gorod->id == $city->id) ? $object->raion->id : ""): old('obj_area'.$city->id), ["class" => "form-control"]) !!}
                                </div>
                            @else
                                <div id="obj_area{{$city->id}}" style="display: none;">
                                    <label for="obj_area{{$city->id}}">Район</label>
                                    {!! Form::select('obj_area'.$city->id, $inputs["obj_area".$city->id], isset($object->gorod) ? (($object->gorod->id == $city->id) ? $object->raion->id : ""): old('obj_area'.$city->id), ["class" => "form-control"]) !!}
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
                                                        <input name="search-query" type="text" class="form-control" id="search-query" placeholder="Что искать...">
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
                        {!! Form::hidden('obj_geo', isset($object->geo)? $object->geo: old("obj_geo"), ["id" => "obj_geo"]) !!}
                        <div id="address form-group">
                            <label for="obj_address">Адрес</label>
                            {!! Form::text('obj_address', isset($object->address)? $object->address : old("obj_address"), ['id'=>'obj_address', "class" => "form-control", 'aria-describedby'=>'adrHelp', "required" => ""]) !!}
                            <small id="adrHelp" class="form-text text-muted">Можно поменять сформировавшийся адрес.</small>
                        </div>
                    </div>
                </section>
                <h3>Удобства</h3>
                <section>
                    <div id="room" class="form-group">
                        <label for="obj_room">Количество комнат</label>
                        {!! Form::select('obj_room', $inputs["obj_room"],isset($object->category) ? (($object->category != 2) ? $object->rooms : ""): old('obj_room'), ["class" => "form-control"]) !!}
                    </div>
                    <div id="home_floors_2" class="form-group" style="display: none;">
                        <label for="obj_home_floors_2">Этажей в доме</label>
                        {!! Form::select('obj_home_floors_2', $inputs["obj_home_floors_2"],isset($object->category) ? (($object->category == 2) ? $object->build_floors : ""): old('obj_home_floors_2'), ["class" => "form-control"]) !!}
                    </div>
                    <div id="build_type">
                        <div id="build_type_1" class="form-group">
                            <label for="obj_build_type_1">Тип дома</label>
                            {!! Form::select('obj_build_type_1', $inputs["obj_build_type_1"],isset($object->category) ? (($object->category != 2) ? $object->build_type : ""): old('obj_build_type_1'), ["class" => "form-control"]) !!}
                        </div>
                        <div id="build_type_2" class="form-group" style="display: none;">
                            <label for="obj_build_type_2">Материал стен</label>
                            {!! Form::select('obj_build_type_2', $inputs["obj_build_type_2"],isset($object->category) ? (($object->category == 2) ? $object->build_type : ""): old('obj_build_type_2'), ["class" => "form-control"]) !!}
                        </div>
                      </div>
                    <div id="floor" class="form-group">
                        <label for="obj_floor">Этаж</label>
                        {!! Form::select('obj_floor', $inputs["obj_floor"],isset($object->category) ? (($object->category != 2) ? $object->floor : ""): old('obj_floor'), ["class" => "form-control"]) !!}
                    </div>
                    <div id="distance" class="form-group" style="display: none;">
                        <label for="obj_distance">Расстояние до города</label>
                        {!! Form::select('obj_distance', $inputs["obj_distance"],isset($object->category) ? (($object->category == 2) ? $object->distance : ""): old('obj_distance'), ["class" => "form-control"]) !!}
                    </div>
                    <div id="home_floors_1" class="form-group">
                        <label for="obj_home_floors_1">Этажей в доме</label>
                        {!! Form::select('obj_home_floors_1', $inputs["obj_home_floors_1"],isset($object->category) ? (($object->category != 2) ? $object->build_floors : ""): old('obj_home_floors_1'), ["class" => "form-control"]) !!}
                    </div>
                    <div id="square" class="form-group">
                        <label for="obj_square">Площадь</label>
                        <div class="input-group">
                            <input name="obj_square" type="text" class="form-control money-mask-input" required>
                            <div class="input-group-addon">
                                <span>м²</span>
                            </div>
                        </div>
                    </div>
                    <div id="house_square" class="form-group" style="display: none;">
                        <label for="obj_house_square">Площадь дома</label>
                        <div class="input-group">
                            <input name="obj_house_square" type="text" class="form-control money-mask-input" required>
                            <div class="input-group-addon">
                                <span>м²</span>
                            </div>
                        </div>
                    </div>
                    <div id="earth_square" class="form-group" style="display: none;">
                        <label for="obj_earth_square">Площадь участка в сот.</label>
                        <div class="input-group">
                            <input name="obj_earth_square" type="text" class="form-control money-mask-input" required>
                            <div class="input-group-addon">
                                <span>сот.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4 class="m-t-md">Удобства</h4>
                        <div>
                            <div id="comforts-no-border" class="no-border">
                                @foreach($comforts as $comfort)
                                <input type="checkbox" name="comfort[]" value="{{$comfort->title}}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <h3>Описание</h3>
                <section>
                    <div id="desc" class="form-group">
                        <label for="obj_desc">Описание объявления</label>
                        <textarea class="form-control" cols="40" rows="6" name="obj_desc"></textarea>
                    </div>
                    <div id="comment" class="form-group">
                        <label for="obj_comment">Комментарий</label>
                        <textarea class="form-control" cols="40" rows="3" name="obj_comment"></textarea>
                    </div>
                    <div id="price_square" class="form-group">
                        <label class="form-label semibold" for="obj_price_square">Цена за м²</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input name="obj_price_square" type="text" class="form-control money-mask-input" readonly/>
                            <i class="glyphicon glyphicon-ruble"></i>
                        </div>
                    </div>
                    <div id="price" class="form-group">
                        <label class="form-label semibold" for="obj_price">Цена</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input name="obj_price" type="text" class="form-control money-mask-input" required/>
                            <i class="glyphicon glyphicon-ruble"></i>
                        </div>
                    </div>
                    <div id="doplata" class="form-group">
                        <label class="form-label semibold" for="obj_doplata">Доплата в руб.</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input name="obj_doplata" type="text" class="form-control money-mask-input" required/>
                            <i class="glyphicon glyphicon-ruble"></i>
                        </div>
                    </div>
                </section>
                <h3>Клиент</h3>
                <section>
                    <div class="col-md-4">
                    <fieldset class="form-group">
                        <label class="form-label semibold" for="client_name">Имя</label>
                        <input id="client_name" name="client_name" class="form-control" type="text">
                    </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_family">Фамилия</label>
                            <input id="client_family" name="client_family" class="form-control" type="text">
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_father_name">Отчество</label>
                            <input id="client_father_name" name="client_father_name" class="form-control" type="text">
                        </fieldset>
                    </div>
                    <h5 class="m-t-lg with-border">Данные</h5>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_place">Место рождения</label>
                            <input id="client_place" name="client_place" class="form-control" type="text">
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_date">Дата рождения</label>
                            <input id="client_date" name="client_date" class="form-control date-mask-input" type="text">
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="client_phone" class="form-label semibold">Телефон</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span>+7</span>
                                    </div>
                                    <input name="client_phone" type="text" class="form-control phone-mask-input" required>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_mail">E-mail</label>
                            <input id="client_mail" name="client_mail" class="form-control" type="email">
                        </fieldset>
                    </div>
                    <h5 class="m-t-lg with-border">Паспорт</h5>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_pasport">Серия, Номер</label>
                            <input id="client_pasport" name="client_pasport" class="form-control pasport-mask-input" type="text">
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_pasport_who_take">Кем выдан</label>
                            <input id="client_pasport_who_take" name="client_pasport_who_take" class="form-control" type="text">
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_pasport_date">Когда выдан</label>
                            <input id="client_pasport_date" name="client_pasport_date" class="form-control date-mask-input" type="text">
                        </fieldset>
                    </div>
                </section>
            </div>
            <input name="obj_id" value="{{$obj_id}}" type="text" hidden >
            {!! Form::close() !!}
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
                <form action="{{route('adminObjUplImg')}}" class="dropzone" id="my-dropzone">
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
