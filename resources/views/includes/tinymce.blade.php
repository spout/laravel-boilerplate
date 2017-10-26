@push('scripts')
<?php
$lang = \App::getLocale();
$langUpper = strtoupper($lang);
$languageUrl = asset("/js/tinymce/langs/{$lang}_{$langUpper}.js");
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
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
        relative_urls: false
    });

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