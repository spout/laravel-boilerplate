{{--<a href="{{ route(sprintf('%s.show', $prefix), [$object->pk]) }}" class="btn btn-default"><i class="fa fa-eye"></i> {{ __('View') }}</a>--}}
<a href="{{ route(sprintf('%s.edit', $prefix), [$object->pk]) }}" class="btn btn-default"><i class="fa fa-edit"></i> {{ __('Edit') }}</a>
<form action="{{ route(sprintf('%s.destroy', $prefix), [$object->pk]) }}" method="post" style="display: inline;">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Delete') }}</button>
</form>