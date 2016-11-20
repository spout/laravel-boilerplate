@push('scripts')
<?php
$lang = \App::getLocale();
//$languageUrl = sprintf('/js/tinymce/langs/%s_%s.js', $lang, strtoupper($lang));
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea.wysiwyg',
        height: "200",
        <?php /*if($lang != 'en'): ?>
        language_url: '<?php echo $languageUrl; ?>',
        <?php endif;*/ ?>
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
            title: "{{ __("File manager") }}",
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