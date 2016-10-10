@if (!empty($menu))
    <ul{!! Html::attributes($menu->attributes) !!}>
        @foreach($menu->menuItems as $item)
            <li>
                <a href="{{ $item->url }}"{!! $item->attributes !!}>{{ $item->title }}</a>
            </li>
        @endforeach
    </ul>
@endif