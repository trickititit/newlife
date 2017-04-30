<div class="col-md-12">
    <ul class="nav nav-tabs">
    @if($menus)
                @include(config('settings.theme').'.admin.objectsMenuItems',['items'=>$menus->roots(), "type" => $type])
    @endif
        {!! Form::select('order', $order_select ,URL::current(), ["onchange" => "window.location.href=this.options[this.selectedIndex].value", "id" => "order"]) !!}
    </ul>
    <!-- Таблица -->
    <div class="tab-content">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th width="1">Фото</th>
                    <th width="1">Сделка</th>
                    <th width="30">Обьект</th>
                    <th width="40">Адрес</th>
                    <th width="10">Цена</th>
                    <th >Описание</th>
                    <th width="10">Доплата</th>
                    <th >Комментарий</th>
                    <th width="100">Контакты</th>
                    <th width="80">Действия</th>
                </tr>
                </thead>
                <tbody>
    @if($objects)
    @foreach($objects as $object)
                <tr>
                    <td class="td-icon">{!! $object->images->isEmpty() ? "" : "<i class=\"fa fa-camera fa-lg\"></i>" !!}</td>
                    <td class="td-icon">{!!  $object->deal == "Продажа" ? "<i class=\"fa fa-shopping-cart fa-lg\"></i>" : "<i class=\"fa fa-retweet fa-lg\"></i>" !!}</td>
                    <td>
                        @if($object->category == 1)
                            <a href="{{$object->id}}">{{$object->rooms}}-к квартира</a><br>{{$object->square}} м² {{$object->floor}}/{{$object->build_floors}} эт.<br>{{ $object->created_at->format('m/d/Y') }}
                        @elseif($object->category == 2)
                            <a href="{{$object->id}}">{{$object->type}}</a><br>{{$object->home_square}} м² на участке {{$object->earth_square}}<br>{{ $object->created_at->format('m/d/Y') }}
                        @elseif($object->category == 3)
                            <a href="{{$object->id}}">Комната в {{$object->rooms}}-к</a><br>{{$object->square}} м² {{$object->floor}}/{{$object->build_floors}} эт.<br>{{ $object->created_at->format('m/d/Y') }}
                        @endif
                    </td>
                    <td>{{ $object->gorod->name }},<br>{{ $object->address }},<br>{{ $object->raion->name }}</td>
                    <td>{{ $object->price }}</td>
                    <td>{{ $object->desc }}</td>
                    <td>{{ $object->surcharge }}</td>
                    <td>{{ $object->comment }}</td>
                    <td >+7 {{$object->client->phone}} - {{ $object->client->name }} {{$object->client->father_name}}<br/>
                        </td>
                    <td width="100"><div class="btn-actions centovka">
                            {!! $actions["object".$object->id] !!}
                         </div>
                    </td>
                </tr>
    @endforeach
    @endif
                </tbody>
            </table>
        </div>
        <div class="pagina col-md-12">
            <nav>
                <ul class="pagination pagination-sm centovka">
                @if($objects->lastPage() > 1)
                    @if($objects->currentPage() !== 1)
                        <li class="page-item"><a class="page-link" href="{{ $objects->url(($objects->currentPage() - 1)) }}">&laquo;</a></li>
                    @else
                        <li class="page-item disabled"><a class="page-link">&laquo;</a></li>
                    @endif
                    @for($i = 1; $i <= $objects->lastPage(); $i++)
                        @if($objects->currentPage() == $i)
                            <li class="page-item active"><a class="page-link">{{ $i }}</a></li>
                        @else
                                <li class="page-item"><a class="page-link" href="{{ $objects->url($i) }}">{{ $i }}</a></li>
                        @endif
                    @endfor
                    @if($objects->currentPage() !== $objects->lastPage())
                        <li class="page-item"><a class="page-link" href="{{ $objects->url(($objects->currentPage() + 1)) }}">&raquo;</a></li>
                    @else
                        <li class="page-item disabled"><a class="page-link">&raquo;</a></li>
                    @endif
                @endif
                 </ul>
            </nav>
        </div>
    </div>

</div>