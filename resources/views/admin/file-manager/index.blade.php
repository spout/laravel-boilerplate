@extends('layouts.admin')

@section('title', _i("File manager"))

@section('content')
    {!! Form::openGroup('user_id', _i("User")) !!}
    {!! Form::select('user_id', $userList) !!}
    {!! Form::closeGroup() !!}

    <iframe src="{{ url('elfinder') }}" class="elfinder"></iframe>
@endsection

@push('scripts')
<script>
    $(function () {
        var elfinderUrl = '{{ url('elfinder') }}';
        $('#user_id').on('change', function () {
            var src = elfinderUrl;
            if ($(this).val()) {
                src += '?path=users/' + $(this).val();
            }
            $('iframe.elfinder').attr('src', src);
        });
    });
</script>
@endpush