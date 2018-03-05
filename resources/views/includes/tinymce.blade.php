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

$tinymceInitSettings = config('tinymce', []);
$tinymceInitSettings['language_url'] = $languageUrl;
$tinymceInitSettings = json_encode(array_merge($tinymceInitSettings, setting('tinymce.basic', [])));
?>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
    window.tinymceInitSettings = JSON.parse('{!! $tinymceInitSettings !!}');
    window.tinymceInitSettings.file_browser_callback = elFinderBrowser;

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