<section class="box-typical box-panel">
    <header class="box-typical-header">
        <div class="tbl-row">
            <div class="tbl-cell tbl-cell-title">
                <h3 id="h3-create-obj">{{ (isset($object->id)) ? "Редактирование объекта" : "Создание нового объекта" }}</h3> <button id="upload-img" class="btn btn-primary clearfix" data-toggle="modal" data-target="#myModal">
                    Загрузить изображения
                </button>
            </div>
        </div>
    </header>
    <div class="box-typical-body">
        {!! Form::open(["url" => (isset($object->id)) ? route('object.update',['object'=>$object->alias]) : route('object.store'), "class" => "form-wizard", 'method' => "POST", "id" => "objCreate"]) !!}
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
                    <div class="col-md-12">
                        <h4 class="m-t-md">Настройки</h4>
                        <div class="col-md-12">
                            <div class="checkbox-bird">
                                {!! Form::checkbox('spec_offer', "1", (isset($object->spec_offer) ? true : false) , ["id" => "spec_offer"]) !!}
                                <label for="spec_offer">Специальное предложение</label>
                            </div>
                        </div>
                        <div class="form-group clearfix" id="spec_offer_input" {{ isset($object->spec_offer) ? "" : "style=display:none;"  }}>
                            <div class="col-md-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="client_family">Поле Специального предложения 1</label>
                                    {!! Form::text('spec_offer_span_1', isset($object->spec_offer_span_1)? $object->spec_offer_span_1 : old("spec_offer_span_1"), ["id" => "spec_offer_span_1" ,"class" => "form-control"]) !!}
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="client_father_name">Поле Специального предложения 2</label>
                                    {!! Form::text('spec_offer_span_2', isset($object->spec_offer_span_2)? $object->spec_offer_span_2 : old("spec_offer_span_2"), ["id" => "spec_offer_span_2" ,"class" => "form-control"]) !!}
                                </fieldset>
                            </div>
                        </div>
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
                         {!! Form::text('obj_square', isset($object->square)? $object->square : old("obj_square"), ["class" => "form-control money-mask-input", "required" => ""]) !!}
                            <div class="input-group-addon">
                                <span>м²</span>
                            </div>
                        </div>
                    </div>
                    <div id="house_square" class="form-group" style="display: none;">
                        <label for="obj_house_square">Площадь дома</label>
                        <div class="input-group">
                            {!! Form::text('obj_house_square', isset($object->home_square)? $object->home_square : old("obj_house_square"), ["class" => "form-control money-mask-input", "required" => ""]) !!}
                            <div class="input-group-addon">
                                <span>м²</span>
                            </div>
                        </div>
                    </div>
                    <div id="earth_square" class="form-group" style="display: none;">
                        <label for="obj_earth_square">Площадь участка в сот.</label>
                        <div class="input-group">
                            {!! Form::text('obj_earth_square', isset($object->earth_square)? $object->earth_square : old("obj_earth_square"), ["class" => "form-control money-mask-input", "required" => ""]) !!}
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
                                            {!! Form::checkbox('comfort[]', $comfort->title) !!}
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <h3>Описание</h3>
                <section>
                    <div id="desc" class="form-group">
                        <label for="obj_desc">Описание объявления</label>
                        {!! Form::textarea('obj_desc', isset($object->desc) ? $object->desc  : old('obj_desc'), ['class' => 'form-control','placeholder'=>'Введите Описание', "cols" => "40", "rows" => "6"]) !!}
                    </div>
                    <div id="comment" class="form-group">
                        <label for="obj_comment">Комментарий</label>
                        {!! Form::textarea("obj_comment", isset($object->comment) ? $object->comment  : old('obj_comment'), ['class' => 'form-control','placeholder'=>'Введите Комментарий', "cols" => "40", "rows" => "3"]) !!}
                    </div>
                    <div id="price_square" class="form-group">
                        <label class="form-label semibold" for="obj_price_square">Цена за м²</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            {!! Form::text('obj_price_square', isset($object->price_square)? $object->price_square : old("obj_price_square"), ["class" => "form-control money-mask-input", "readonly" => ""]) !!}
                            <i class="glyphicon glyphicon-ruble"></i>
                        </div>
                    </div>
                    <div id="price" class="form-group">
                        <label class="form-label semibold" for="obj_price">Цена</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            {!! Form::text('obj_price', isset($object->price)? $object->price : old("obj_price"), ["class" => "form-control money-mask-input", "required" => ""]) !!}
                            <i class="glyphicon glyphicon-ruble"></i>
                        </div>
                    </div>
                    <div id="doplata" class="form-group">
                        <label class="form-label semibold" for="obj_doplata">Доплата в руб.</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            {!! Form::text('obj_doplata', isset($object->surcharge)? $object->surcharge : old("obj_doplata"), ["class" => "form-control money-mask-input", "required" => ""]) !!}
                            <i class="glyphicon glyphicon-ruble"></i>
                        </div>
                    </div>
                </section>
                <h3>Клиент</h3>
                <section>
                    <div class="col-md-4">
                    <fieldset class="form-group">
                        <label class="form-label semibold" for="client_name">Имя</label>
                        {!! Form::text('client_name', isset($object->client->name)? $object->client->name : old("client_name"), ["id" => "client_name" ,"class" => "form-control", "required" => ""]) !!}
                    </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_family">Фамилия</label>
                            {!! Form::text('client_family', isset($object->client->family)? $object->client->family : old("client_family"), ["id" => "client_family" ,"class" => "form-control", "required" => ""]) !!}
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_father_name">Отчество</label>
                            {!! Form::text('client_father_name', isset($object->client->father_name)? $object->client->father_name : old("client_father_name"), ["id" => "client_father_name" ,"class" => "form-control", "required" => ""]) !!}
                        </fieldset>
                    </div>
                    <h5 class="m-t-lg with-border">Данные</h5>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_place">Место рождения</label>
                            {!! Form::text('client_place', isset($object->client->place)? $object->client->place : old("client_place"), ["id" => "client_place" ,"class" => "form-control"]) !!}
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_date">Дата рождения</label>
                            {!! Form::text('client_date', isset($object->client->date)? $object->client->date : old("client_date"), ["id" => "client_date" ,"class" => "form-control date-mask-input"]) !!}
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="client_phone" class="form-label semibold">Телефон</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span>+7</span>
                                    </div>
                                    {!! Form::text('client_phone', isset($object->client->phone)? $object->client->phone : old("client_phone"), ["id" => "client_phone" ,"class" => "form-control phone-mask-input",  "required" => ""]) !!}
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_mail">E-mail</label>
                            {!! Form::email('client_mail', isset($object->client->mail)? $object->client->mail : old("client_mail"), ["id" => "client_mail" ,"class" => "form-control"]) !!}
                        </fieldset>
                    </div>
                    <h5 class="m-t-lg with-border">Паспорт</h5>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_pasport">Серия, Номер</label>
                            {!! Form::text('client_pasport', isset($object->client->pasport)? $object->client->pasport : old("client_pasport"), ["id" => "client_pasport" ,"class" => "form-control pasport-mask-input"]) !!}
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_pasport_who_take">Кем выдан</label>
                            {!! Form::text('client_pasport_who_take', isset($object->client->pasport_who_take)? $object->client->pasport_who_take : old("client_pasport_who_take"), ["id" => "client_pasport_who_take" ,"class" => "form-control"]) !!}
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="client_pasport_date">Когда выдан</label>
                            {!! Form::text('client_pasport_date', isset($object->client->pasport_date)? $object->client->pasport_date : old("client_pasport_date"), ["id" => "client_pasport_date" ,"class" => "form-control date-mask-input"]) !!}
                        </fieldset>
                    </div>
                </section>
            </div>
            @if(isset($object->id))
                <input type="hidden" name="_method" value="PUT">
            @endif
            {!! Form::hidden('obj_id', isset($object->id)? $object->id: old("obj_id", $obj_id)) !!}
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
                {!! Form::open(["url" => route("adminObjUplImg"), "class" => "dropzone", 'method' => "POST", "id" => "my-dropzone"]) !!}
                    {!! Form::hidden('obj_id', isset($object->id)? $object->id: old("obj-id", $obj_id), ["id" => "obj-id"]) !!}
                    {!! Form::hidden('tmp_img', isset($object->id)? 0: old("tmp-img", 1), ["id" => "tmp-img"]) !!}
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>