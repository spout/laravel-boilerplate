@include('includes.paginator-counter', ['results' => $objectList])

<table class="table table-striped">
    @if (isset($columns))
        <thead>
            <tr>
                @foreach ($columns as $column => $label)
                    <th>{{ $label }}</th>
                @endforeach
            </tr>
        </thead>
    @endif
    <tbody>
        @foreach ($objectList as $object)
            <tr>
                @foreach ($columns as $column => $label)
                    <td>
                        @if (View::exists(sprintf('%s.includes.columns.%s', $resourcePrefix, $column)))
                            @include(sprintf('%s.includes.columns.%s', $resourcePrefix, $column))
                        @else
                            @if ($column == 'actions')
                                @include('includes.crud.actions')
                            @else
                                @if ($column == '__toString')
                                    {{ $object }}
                                @else
                                    {{ $object->{$column} }}
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