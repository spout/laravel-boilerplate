@if (in_array('export', $actions) || array_key_exists('export', $actions))
    <a href="{{ route("$resourcePrefix.export", ['pk' => $object->pk, 'format' => 'pdf']) }}" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i> {{ _i('PDF') }}</a>
    <a href="{{ route("$resourcePrefix.export", ['pk' => $object->pk, 'format' => 'xlsx']) }}" class="btn btn-default btn-xs"><i class="fa fa-file-excel-o"></i> {{ _i('Excel') }}</a>
@endif