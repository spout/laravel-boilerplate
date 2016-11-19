<table class="table table-bordered table-condensed" id="contents-table">
    <thead>
    <tr>
        @foreach($columns as $column => $label)
            <th>{{ $label }}</th>
        @endforeach
    </tr>
    </thead>
</table>

@include('includes.datatables.assets')

@push('scripts')
<script>
    <?php
    $datatableColumns = json_encode(array_map(function ($v) {
        switch ($v) {
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