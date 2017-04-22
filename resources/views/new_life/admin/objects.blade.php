<div class="col-md-12">
    <ul class="nav nav-tabs ">
        <li class="nav-item">
            <a class="nav-link active" href="http://rieltor/cabinet/">Все<span class="badge badge-default margin-left">58</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://rieltor/cabinet/?typepage=my">Мой<span class="badge badge-default margin-left">7</span></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="http://rieltor/cabinet/?typepage=in_work">В работе<span class="badge badge-default margin-left">5</span></a></li>
        <li class="nav-item"><a class="nav-link" href="http://rieltor/cabinet/?typepage=completed">Завершенные<span class="badge badge-default margin-left badge-war">2</span></a></li>
        <li class="nav-item"><a class="nav-link" href="http://rieltor/cabinet/?typepage=moder">На модерации<span class="badge badge-default margin-left">2</span></a></li>

        <select onchange="window.location.href=this.options[this.selectedIndex].value" id="order" name="order">
            <option value="http://rieltor/cabinet/?order=date">По дате</option>
            <option value="http://rieltor/cabinet/?order=priceup">Дешевле</option>
            <option value="http://rieltor/cabinet/?order=pricedown">Дороже</option>
        </select></ul>
    <!-- Таблица -->
    <div class="tab-content">
        <div class="table-responsive">
    @if($objects)
    @foreach($objects as $object)
            <div class="obj-table-elem">
                <table class="table table-hover">
                <tbody>
                <tr>
                    <td><div style="width: 30px;">{!! $object->images->isEmpty() ? "" : "<i class=\"fa fa-camera fa-lg\"></i>" !!}</div></td>
                    <td><div style="width: 30px;">{!!  $object->deal == "Продажа" ? "<i class=\"fa fa-shopping-cart fa-lg\"></i>" : "<i class=\"fa fa-retweet fa-lg\"></i>" !!}</div></td>
                    <td><div style="width: 110px;">
                        @if($object->category == 1)
                            <a href="{{$object->id}}">{{$object->rooms}}-к квартира</a><br>{{$object->square}} м² {{$object->floor}}/{{$object->build_floors}} эт.<br>{{ $object->created_at->format('m/d/Y') }}
                        @elseif($object->category == 2)
                            <a href="{{$object->id}}">{{$object->type}}</a><br>{{$object->square}} м² на участке {{$object->earth_square}}<br>{{ $object->created_at->format('m/d/Y') }}
                        @elseif($object->category == 3)
                            <a href="{{$object->id}}">Комната в {{$object->rooms}}-к</a><br>{{$object->home_square}} м² {{$object->floor}}/{{$object->build_floors}} эт.<br>{{ $object->created_at->format('m/d/Y') }}
                        @endif
                    </div></td>
                    <td><div style="width: 130px;">{{ $object->gorod->name }},<br>{{ $object->address }},<br>{{ $object->raion->name }}</div></td>
                    <td><div style="width: 50px;">{{ $object->price }}</div></td>
                    <td><div style="width: 300px;">{{ $object->desc }}</div></td>
                    <td><div style="width: 50px;">{{ $object->surcharge }}</div></td>
                    <td><div style="width: 300px;">{{ $object->comment }}</div></td>
                    <td><div style="width: 120px;">+7 {{$object->client->phone}} - {{ $object->client->name }} {{$object->client->father_name}}<br/>
                     {{--@foreach($object->comforts as $comfort)--}}
                            {{--{{ $comfort->title }}--}}
                     {{--@endforeach--}}
                        </div></td>
                    <td style="width: 75px"><a href="http://rieltor/cabinet/?view=objedit&amp;id=65" title="Редактировать"><i class="fa fa-edit fa-lg"></i></a><a href="http://rieltor/cabinet/?do=in_pre_work&amp;id=65" title="Взять в работу"><i class="fa fa-gears fa-lg"></i></a><i title="Убрать из избранное" class="fa fa-star fa-lg favor"><id hidden="">65</id></i><a href="http://rieltor/cabinet/?do=pre_delete&amp;id=65" title="Удалить"><i class="fa fa-trash fa-lg"></i></a></td>
                </tr>
                </tbody>
            </table>
            </div>
    @endforeach
    @endif
        </div>
        <div id="fine-uploader-gallery"></div>
        <div class="pagina col-md-12">
            <nav aria-label="Page navigation example">
            <ul class="pagination centovka">
                <li class="page-item active"><a class="page-link" href="http://rieltor/cabinet/">1</a></li><li class="page-item"><a class="page-link" href="http://rieltor/cabinet/?page=2">2</a></li>
            </ul>
            </nav>
        </div>
    </div>

</div>