@if (in_array('export', $actions) || array_key_exists('export', $actions))
    <a href="{{ route("$resourcePrefix.export", [$object->pk]) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> {{ _i('PDF') }}</a>
@endif