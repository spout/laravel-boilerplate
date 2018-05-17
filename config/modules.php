<?php

return [
    'videos' => [
        'model' => \App\Models\Video::class,
        'formRequest' => \App\Http\Requests\VideoFormRequest::class,
    ],
    'forms' => [
        'model' => \App\Models\Form::class,
        'formRequest' => \App\Http\Requests\FormFormRequest::class,
    ],
];