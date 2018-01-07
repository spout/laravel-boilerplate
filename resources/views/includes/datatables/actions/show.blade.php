@if (in_array('show', $actions) || array_key_exists('show', $actions))
    <a href="{{ route("$resourcePrefix.show", [$object->pk]) }}" class="btn btn-secondary"><i class="fa fa-eye"></i> {{ _i('View') }}</a>
@endif