@foreach($items as $item)
    @if($item->hasChildren())
        <li class="grey {{ (URL::current() == $item->url()) ? "active" : '' }} {{$item->hasChildren() ? "with-sub" : ''}}" >
        <span>
            <i class="{{ $item->icon }}"></i>
            <span class="lbl">{{ $item->title }}</span>
        </span>
            <ul>
            @foreach($item->children() as $children)
              <li><a href="{{ $children->url() }}"><span class="lbl">{{ $children->title }}</span></a></li>
            @endforeach
             </ul>
    @else
        <li class="red">
            <a href="{{ $item->url() }}">
                <i class="{{ $item->icon }}"></i>
                <span class="lbl">{{ $item->title }}</span>
            </a>
        </li>
    @endif
@endforeach