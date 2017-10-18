@if (!empty($items))
    <div id="{{ $carouselId }}" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($items as $k => $item)
                <li data-target="#{{ $carouselId }}" data-slide-to="{{ $k }}" class="{{ $k === 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <div class="carousel-inner" role="listbox">
            @foreach($items as $k => $item)
                <div class="item {{ $k === 0 ? 'active' : '' }}">
                    <img src="{{ route('imagecache', ['template' => $template, 'filename' => $shortcode->directory . '/' . basename($item)]) }}" alt="">
                    {{--<div class="carousel-caption">--}}
                        {{--{{ $item }}--}}
                    {{--</div>--}}
                </div>
            @endforeach
        </div>

        <a class="left carousel-control" href="#{{ $carouselId }}" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">{{ _i("Previous") }}</span>
        </a>
        <a class="right carousel-control" href="#{{ $carouselId }}" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">{{ _i("Next") }}</span>
        </a>
    </div>
@endif