<?php

return [
    'galleries' => [
        'model' => \App\Models\Gallery::class,
        'formRequest' => \App\Http\Requests\GalleryFormRequest::class,
    ],
    'rich-texts' => [
        'model' => \App\Models\RichText::class,
        'formRequest' => \App\Http\Requests\RichTextFormRequest::class,
    ],
    'videos' => [
        'model' => \App\Models\Video::class,
        'formRequest' => \App\Http\Requests\VideoFormRequest::class,
    ],
    'maps' => [
        'model' => \App\Models\Map::class,
        'formRequest' => \App\Http\Requests\MapFormRequest::class,
    ],
];