<div class="col-md-12">
    <ul class="nav nav-tabs">
    @if($menus)
                @include(config('settings.theme').'.admin.objectsMenuItems',['items'=>$menus->roots()])
    @endif
        <select onchange="window.location.href=this.options[this.selectedIndex].value" id="order" name="order">
            <option value="http://rieltor/cabinet/?order=date">По дате</option>
            <option value="http://rieltor/cabinet/?order=priceup">Дешевле</option>
            <option value="http://rieltor/cabinet/?order=pricedown">Дороже</option>
        </select>
    </ul>
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
                            <a href="{{$object->id}}">{{$object->type}}</a><br>{{$object->home_square}} м² на участке {{$object->earth_square}}<br>{{ $object->created_at->format('m/d/Y') }}
                        @elseif($object->category == 3)
                            <a href="{{$object->id}}">Комната в {{$object->rooms}}-к</a><br>{{$object->square}} м² {{$object->floor}}/{{$object->build_floors}} эт.<br>{{ $object->created_at->format('m/d/Y') }}
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
                    <td style="width: 75px">{!! $actions["object".$object->id] !!}</td>
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