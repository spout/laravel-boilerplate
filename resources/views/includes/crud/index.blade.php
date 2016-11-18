@include('includes.paginator-counter', ['results' => $objectList])

<table class="table table-striped">
    @if (isset($cols))
        <thead>
            <tr>
                @foreach ($cols as $col => $label)
                    <th>{{ $label }}</th>
                @endforeach
            </tr>
        </thead>
    @endif
    <tbody>
        @foreach ($objectList as $object)
            <tr>
                @foreach ($cols as $col => $label)
                    <td>
                        @if (View::exists(sprintf('%s.includes.cols.%s', $prefix, $col)))
                            @include(sprintf('%s.includes.cols.%s', $prefix, $col))
                        @else
                            @if ($col == 'actions')
                                @include('includes.crud.actions')
                            @else
                                @if ($col == '__toString')
                                    {{ $object }}
                                @else
                                    {{ $object->{$col} }}
                                @endif
                            @endif
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

{{ $objectList->links() }}