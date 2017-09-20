<div class="form-group">
    <label class="control-label">{{ $title }}</label>
    <div class="form-control-static">
        <div class="row" id="templates-tags">
            @foreach(config('templates-tags') as $tag => $label)
                <div class="col-sm-3">
                    {{ $label }}: <a href="#">[{{ $tag }}]</a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
  $(function () {
    $("#templates-tags a").on('click', function(e) {
      e.preventDefault();

      var $template = $('#template');
      var caretPos = $template[0].selectionStart;
      var textAreaTxt = $template.val();
      if ($template.hasClass('wysiwyg') && typeof tinymce !== 'undefined') {
        tinymce.activeEditor.execCommand('mceInsertContent', false, $(this).text());
      } else {
        $template.val(textAreaTxt.substring(0, caretPos) + $(this).text() + textAreaTxt.substring(caretPos) );
      }
    });
  });
</script>
@endpush