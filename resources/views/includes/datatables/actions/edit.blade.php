@if (in_array('edit', $actions) || array_key_exists('edit', $actions))
    <a href="{{ route("$resourcePrefix.edit", [$object->pk]) }}" class="btn btn-secondary"><i class="fa fa-edit"></i> {{ _i('Edit') }}</a>
@endif