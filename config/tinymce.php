<?php
return [
    'selector' => 'textarea.wysiwyg',
    'content_css' => asset('build/app.css'),
    'height' => 200,
    // 'language_url' => $languageUrl,
    'menubar' => true,
    'plugins' => [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
    ],
    'toolbar' => 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    'file_browser_callback' => 'elFinderBrowser',
    'relative_urls' => false,
    'entity_encoding' => 'raw',
    'forced_root_block' => false,
];