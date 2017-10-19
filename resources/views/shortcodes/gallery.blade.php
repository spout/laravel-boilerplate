@if(!empty($items))
    <div class="row">
        @foreach($items as $item)
            <div class="col-sm-{{ intval($totalColumns / $columns) }}">
                <a href="{{ route('imagecache', ['template' => 'original', 'filename' => $shortcode->directory . '/' . basename($item)]) }}" class="thumbnail lightbox">
                    <img src="{{ route('imagecache', ['template' => $template, 'filename' => $shortcode->directory . '/' . basename($item)]) }}" alt="">
                </a>
            </div>
        @endforeach
    </div>
@endif