@if (in_array('edit', $actions) || array_key_exists('edit', $actions))
    <a href="{{ route("$resourcePrefix.edit", [$object->pk]) }}" class="btn btn-secondary btn-sm">{{ _i('Edit') }}</a>
@endif