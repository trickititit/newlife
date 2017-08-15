@foreach($items as $item)
    @if($item->hasChildren())
        <li class="grey {{ (URL::current() == $item->url()) ? "active" : '' }} {{$item->hasChildren() ? "with-sub" : ''}}" >
        <span>
            <i class="{{ $item->icon }}"></i>
            <span class="lbl">{{ $item->title }}</span>
        </span>
            <ul>
            @foreach($item->children() as $children)
                @if($children->title == "Отчет по объектам")
                    <li><a {{$children->data_b }}><span class="lbl">{{ $children->title }}</span></a></li>
                @else
                    <li><a href="{{ $children->url() }}"><span class="lbl">{{ $children->title }}</span></a></li>
                @endif
            @endforeach
             </ul>
    @else
        @if($item->title == "Парсинг Авито")
            <li class="red">
                <a {{ $item->data_b }}>
                    <i class="{{ $item->icon }}"></i>
                    <span class="lbl">{{ $item->title }}</span>
                </a>
            </li>
        @else
            <li class="red">
                <a href="{{ $item->url() }}">
                    <i class="{{ $item->icon }}"></i>
                    <span class="lbl">{{ $item->title }}</span>
                </a>
            </li>
        @endif
    @endif
@endforeach