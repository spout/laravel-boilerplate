@if (!empty($menu))
    <?php
    $attributes = '';
    if (!empty($menu->attributes)) {
        $attributes = Html::attributes(['class' => 'nav navbar-nav']);
    }
    ?>
    <ul{!! $attributes !!}>
        @foreach($menu->menuItems as $item)
            <li>
                <a href="{{ $item->url }}">{{ $item->title }}</a>
            </li>
        @endforeach
    </ul>
@endif