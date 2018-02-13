<div class="alert alert-{{ $type or 'danger' }}{{ !empty($dismissible) ? ' alert-dismissible' : '' }} fade show" role="alert">
    {{ $slot }}
    <button type="button" class="close" data-dismiss="alert" aria-label="{{ _i("Close") }}">
        <span aria-hidden="true">&times;</span>
    </button>
</div>