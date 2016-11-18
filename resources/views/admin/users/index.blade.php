@extends('layouts.admin')

@section('title', __("Users"))

{{--
@section('content')
    @include('includes.crud.index', [
        'cols' => [
            'username' => __("Username"),
            'email' => __("Email"),
            'firstname' => __("Firstname"),
            'lastname' => __("Lastname"),
            'actions' => __("Actions"),
        ],
    ])
@endsection--}}

@section('content')
    <table class="table table-bordered table-condensed" id="users-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
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
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.users.datatables') !!}',
            columns: [
                {data: 'id'},
                {data: 'username'},
                {data: 'email'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'actions', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush