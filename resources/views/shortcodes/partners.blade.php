<?php
$dataSlick = [
    'slidesToShow' => 5,
    'slidesToScroll' => 1,
    //'centerMode' => true,
    'autoplay' => false,
    'prevArrow' => '<button type="button" class="slick-prev"><i class="fa fa-long-arrow-left"></i></button>',
    'nextArrow' => '<button type="button" class="slick-next"><i class="fa fa-long-arrow-right"></i></button>',
    'responsive' => [
        [
            'breakpoint' => 1024,
            'settings' => [
                'slidesToShow' => 2
            ]
        ]
    ]
];
?>
<div id="carousel-partners" data-slick="{{ json_encode($dataSlick) }}">
    @foreach($items as $k => $item)
        <div class="partner">
            <img src="{{ asset('files/partners') . '/' . basename($item) }}" alt="">
        </div>
    @endforeach
</div>