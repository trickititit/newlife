@if($objects->isNotEmpty())
    @if ($objects->count() > 4)
        <div class="col-md-12">
            <div class="sepor"></div>
        </div>
        <div class="col-md-12">
            <div class="title_offer">Специальное предложение:</div>
        </div>
        <div class="col-md-12">
            <div class="slider4">
                @foreach($objects as $object)
                    <div class="slide">
                        <a href='{{route('site.object',['object'=>$object->alias])}}' class="spec_offer">
                            <div class="img_offer">
                                @if($object->category == 2)
                                    <i class="fa fa-home  fa-5x"></i>
                                @else
                                    <i class="fa fa-building  fa-5x"></i>
                                @endif
                            </div>
                            <span class="text_offer">
                                @if($object->category == 1)
                                    {{$object->rooms}}-к квартира {{$object->square}} м² {{$object->floor}}/{{$object->build_floors}} эт.
                                @elseif($object->category == 2)
                                    {{$object->type}} {{$object->home_square}} м² на участке {{$object->earth_square}}
                                @elseif($object->category == 3)
                                    Комната в {{$object->rooms}}-к {{$object->square}} м² {{$object->floor}}/{{$object->build_floors}} эт.
                                @endif
                            </span>
                            <span class="desc_offer">{{ $object->desc }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="col-md-12">
            <div class="sepor"></div>
        </div>
        <div class="col-md-12">
            <div class="title_offer">Специальное предложение:</div>
        </div>
        <div class="col-md-12">
            <div class="slider4">
                @foreach($objects as $object)
                <div class="slide"><div class="col-md-3">
                    <a href='{{route('site.object',['object'=>$object->alias])}}' class="spec_offer">
                        <div class="img_offer">
                            @if($object->category == 2)
                                <i class="fa fa-home  fa-5x"></i>
                            @else
                                <i class="fa fa-building  fa-5x"></i>
                            @endif
                        </div>
                        <span class="text_offer">
                            @if($object->category == 1)
                                {{$object->rooms}}-к квартира {{$object->square}} м² {{$object->floor}}/{{$object->build_floors}} эт.
                            @elseif($object->category == 2)
                                {{$object->type}} {{$object->home_square}} м² на участке {{$object->earth_square}}
                            @elseif($object->category == 3)
                                Комната в {{$object->rooms}}-к {{$object->square}} м² {{$object->floor}}/{{$object->build_floors}} эт.
                            @endif
                        </span>
                        <span class="desc_offer">{{ $object->desc }}</span>
                    </a>
                </div></div>
                @endforeach
            </div>
        </div>
    @endif
@endif