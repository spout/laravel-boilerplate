{{--<a href="{{ route(sprintf('%s.show', $prefix), ['id' => $object->id]) }}" class="btn btn-default"><i class="fa fa-eye"></i> {{ trans('View') }}</a>--}}
<a href="{{ route(sprintf('%s.edit', $prefix), ['id' => $object->id]) }}" class="btn btn-default"><i class="fa fa-edit"></i> {{ trans('Edit') }}</a>
<form action="{{ route(sprintf('%s.destroy', $prefix), ['id' => $object->id]) }}" method="post" style="display: inline;">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{ trans('Delete') }}</button>
</form>