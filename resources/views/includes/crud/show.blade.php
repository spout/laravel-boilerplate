<dl class="dl-horizontal">
    @if (!empty($cols))
        @foreach ($cols as $col => $label)
            <dt>{{ $label }}</dt>
            <dd>{{ $object->{$col} }}</dd>
        @endforeach
    @else
        @foreach ($object['attributes'] as $attribute => $value)
            <dt>{{ $attribute }}</dt>
            <dd>{{ $value }}</dd>
        @endforeach
    @endif
</dl>
