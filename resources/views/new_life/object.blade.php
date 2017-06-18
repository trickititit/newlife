<div id="content">
    <div class="col-md-2 obj-icon">
        <img class="center" src="{{ asset(config('settings.theme')) }}/img/svg/{{$obj_image}}">
    </div>
    <div class="col-md-7">
        <div class="col-md-12 title_view">
             {{$object->address}}. {{ $title }}
        </div>
        <div class="col-md-12 time_view">
            Размещено {{ $object->created_at }}
        </div>
    </div>
    <div class="col-md-3">
        <span class="price_view">{{ $object->getViewPrice() }} р.</span>
    </div>
    {!! $gallery !!}
    <div class="col-md-12 block_content">
        @foreach($object->comforts as $comfort)
        <div class="comfort">
            <i class="fa fa-check-square-o"></i>
            {{ $comfort->title }}
        </div>
        @endforeach
    </div>
    <div class="col-md-8 block_content obj-desc">
        <span>{{$object->desc}}</span>
    </div>
    <div class="col-md-3 offset-md-1 block_content">
        <div class="rietor-avatar">
            <img class="center" src="{{ asset(config('settings.theme')) }}/img/avatar-1-64.png">
        </div>
        <div class="rieltor-name">
            <span>{{$object->createdUser->name}}</span>
        </div>
        <div class="rieltor-call">
            <button class="btn btn-success">Написать</button>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row-fluid">
            <div id="YMapsID" class="span8"></div>
        </div>
    </div>
</div>