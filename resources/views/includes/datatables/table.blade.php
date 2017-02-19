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
            columns: {!! $datatableColumns !!},
            "language": {
                "emptyTable":     "{{ __("No data available in table") }}",
                "info":           "{{ __("Showing _START_ to _END_ of _TOTAL_ entries") }}",
                "infoEmpty":      "{{ __("Showing 0 to 0 of 0 entries") }}",
                "infoFiltered":   "{{ __("(filtered from _MAX_ total entries)") }}",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "{{ __("Show _MENU_ entries") }}",
                "loadingRecords": "{{ __("Loading...") }}",
                "processing":     "{{ __("Processing...") }}",
                "search":         "_INPUT_", //Search:
                "zeroRecords":    "{{ __("No matching records found") }}",
                "paginate": {
                "first":      "{{ __("First") }}",
                    "last":       "{{ __("Last") }}",
                    "next":       "{{ __("Next") }}",
                    "previous":   "{{ __("Previous") }}"
                },
                "aria": {
                    "sortAscending":  "{{ __(": activate to sort column ascending") }}",
                        "sortDescending": "{{ __(": activate to sort column descending") }}"
                },
                "searchPlaceholder": "{{ __("Quick search...") }}"
            }
        });
    });
</script>
@endpush