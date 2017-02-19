{{--<a href="{{ route(sprintf('%s.show', $resourcePrefix), [$object->pk]) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> {{ __('View') }}</a>--}}
<a href="{{ route(sprintf('%s.edit', $resourcePrefix), [$object->pk]) }}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> {{ __('Edit') }}</a>
<form action="{{ route(sprintf('%s.destroy', $resourcePrefix), [$object->pk]) }}" method="post" style="display: inline;" onsubmit="return confirm('{{ __("Are your sure?") }}');">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> {{ __('Delete') }}</button>
</form>