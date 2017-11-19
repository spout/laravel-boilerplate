@if (!empty($items))
    <?php
    $dataSlick = [
        'slidesToShow' => 1,
        'slidesToScroll' => 1,
        'autoplay' => true,
        'prevArrow' => '<button type="button" class="slick-prev"><i class="fa fa-long-arrow-left"></i></button>',
        'nextArrow' => '<button type="button" class="slick-next"><i class="fa fa-long-arrow-right"></i></button>',
    ];
    ?>
    <div id="{{ $carouselId }}" data-slick="{{ json_encode($dataSlick) }}">
        @foreach($items as $k => $item)
            <img src="{{ route('imagecache', ['template' => $template, 'filename' => $shortcode->directory . '/' . basename($item)]) }}" alt="" class="img-responsive">
        @endforeach
    </div>
@endif