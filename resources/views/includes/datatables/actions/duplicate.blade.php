@if (in_array('duplicate', $actions) || array_key_exists('duplicate', $actions))
    <a href="{{ route("$resourcePrefix.duplicate", [$object->pk]) }}" class="btn btn-secondary btn-sm">{{ _i('Duplicate') }}</a>
@endif