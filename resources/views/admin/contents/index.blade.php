@extends('layouts.admin')

@section('title', __("Contents"))

{{--@section('content')
    @include('includes.crud.index', [
        'cols' => [
            '__toString' => __("Title"),
            'slug' => __("Slug"),
            'path' => __("Path"),
            'actions' => __("Actions"),
        ],
    ])
@endsection--}}

@section('content')
    <table class="table table-bordered table-condensed" id="contents-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Path</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        </thead>
    </table>
@stop

@include('includes.datatables')
@push('scripts')
<script>
    $(function () {
        $('#contents-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.contents.datatables') !!}',
            columns: [
                {data: 'id'},
                {data: 'title'},
                {data: 'slug'},
                {data: 'path'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush