@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.3.3/ace.js"></script>
<script src="https://cloud9ide.github.io/emmet-core/emmet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.3.3/ext-emmet.js"></script>
<script>
    $(function () {
        // https://gist.github.com/duncansmart/5267653
        $('textarea[data-editor]').each(function () {
            var textarea = $(this);
            var mode = textarea.data('editor');
            var editDiv = $('<div>', {
                position: 'absolute',
                width: textarea.width(),
                height: textarea.height(),
                //height: '500px',
                'class': textarea.attr('class')
            }).insertBefore(textarea);
            textarea.css('display', 'none');
            var editor = ace.edit(editDiv[0]);
            //editor.renderer.setShowGutter(false);
            editor.getSession().setValue(textarea.val());
            editor.getSession().setMode("ace/mode/" + mode);
            editor.setTheme("ace/theme/{{ $theme or 'monokai' }}");
            editor.setShowPrintMargin(false);
            //editor.setAutoScrollEditorIntoView(true);
            //editor.setOption("maxLines", 30);
            editor.setOption("enableEmmet", true);

            // copy back to textarea on form submit...
            textarea.closest('form').submit(function () {
                textarea.val(editor.getSession().getValue());
            });
        });
    });
</script>
@endpush