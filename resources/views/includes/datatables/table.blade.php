@if (!empty($columns['bulk']))
    {!! Form::open(['route' => sprintf('%s.bulk', $resourcePrefix)]) !!}
@endif

<table class="table table-bordered table-condensed" id="contents-table">
    <thead>
    <tr>
        @foreach($columns as $column => $label)
            @if ($column == 'bulk')
                <th>{!! Form::checkbox('bulk_all', 1, null, ['data-check-all' => true, 'data-target' => '.bulk-checkbox']) !!}</th>
            @else
                <th>{{ $label }}</th>
            @endif
        @endforeach
    </tr>
    </thead>
</table>

@if (!empty($columns['bulk']) && !empty($bulkActions))
    <div class="row">
        <div class="col-sm-4">
            <div class="input-group">
                {!! Form::select('action', ['' => '-'] + $bulkActions) !!}
                <span class="input-group-btn">
                    <button class="btn btn-default btn-xs" type="submit">{{ __("Submit") }}</button>
                </span>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@endif

@include('includes.datatables.assets')

@push('scripts')
<script>
    <?php
    $datatableColumns = json_encode(array_map(function ($v) {
        switch ($v) {
            case 'bulk':
            case 'actions':
                return ['data' => $v, 'orderable' => false, 'searchable' => false];
                break;

            default:
                return ['data' => $v];
                break;
        }

    }, array_keys($columns)));
    ?>
    $(function () {
        $('#contents-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! $ajax !!}',
            columns: {!! $datatableColumns !!}
        });
    });
</script>
@endpush