@push('scripts')
<?php
$lang = \LaravelLocalization::getCurrentLocale();
$langUpper = strtoupper($lang);
$languageBasePath = '/js/tinymce/langs/';
$languagePath = "{$languageBasePath}{$lang}_{$langUpper}.js";
if (!file_exists(public_path($languagePath))) {
    $languagePath = "{$languageBasePath}{$lang}.js";
}
$languageUrl = asset($languagePath);
?>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
    window.tinymceInitSettings = {
        selector: 'textarea.wysiwyg',
        content_css: '{{ asset('build/app.css') }}',
        height: "200",
        @if ($lang !== 'en')
        language_url: '{!! $languageUrl !!}',
        @endif
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        file_browser_callback: elFinderBrowser,
        relative_urls: false,
        entity_encoding : "raw",
        forced_root_block: false
    };

    tinymce.init(window.tinymceInitSettings);

    function elFinderBrowser(field_name, url, type, win) {
        tinymce.activeEditor.windowManager.open({
            file: '<?= route('elfinder.tinymce4') ?>',// use an absolute path!
            title: "{{ _i("File manager") }}",
            width: 900,
            height: 450,
            resizable: 'yes'
        }, {
            setUrl: function (url) {
                win.document.getElementById(field_name).value = url;
            }
        });
        return false;
    }
</script>
@endpush