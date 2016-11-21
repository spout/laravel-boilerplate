<dl class="dl-horizontal">
    @if (!empty($columns))
        @foreach ($columns as $column => $label)
            <dt>{{ $label }}</dt>
            <dd>{{ $object->{$column} }}</dd>
        @endforeach
    @else
        @foreach ($object['attributes'] as $attribute => $value)
            <dt>{{ $attribute }}</dt>
            <dd>{{ $value }}</dd>
        @endforeach
    @endif
</dl>
