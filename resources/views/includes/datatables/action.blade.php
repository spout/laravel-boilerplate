<div class="btn-group btn-group-xs">
    {{--<a href="{{ route(sprintf('%s.show', $resourcePrefix), [$object->pk]) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> {{ __('View') }}</a>--}}
    <a href="{{ route(sprintf('%s.edit', $resourcePrefix), [$object->pk]) }}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> {{ __('Edit') }}</a>
    <?php
    $route = ["$resourcePrefix.destroy", $object->pk];
    $formName = 'post_' . md5(json_encode($route));
    $confirm = __('Are you sure?');
    $onclick = "if (confirm('$confirm')) { document.$formName.submit(); } event.returnValue = false; return false;";
    ?>
    <a href="#" onclick="{!! $onclick !!}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('Delete') }}</a>
    {{ Form::open(['route' => $route, 'method' => 'delete', 'name' => $formName]) }}
    {{ Form::close() }}
</div>