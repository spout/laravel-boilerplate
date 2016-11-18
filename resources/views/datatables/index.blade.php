@extends('layouts.app')

@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
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
            ajax: '{!! route('datatables.data', ['data' => 'wtf']) !!}',
            columns: [
                {data: 'id'},
                {data: 'username'},
                {data: 'email'},
                {data: 'created_at'},
                {data: 'updated_at'}
            ]
        });
    });
</script>
@endpush