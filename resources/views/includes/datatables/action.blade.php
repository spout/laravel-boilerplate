<div class="btn-group btn-group-xs">
    {{--<a href="{{ route("$resourcePrefix.show", [$object->pk]) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> {{ _i('View') }}</a>--}}
    <a href="{{ route("$resourcePrefix.edit", [$object->pk]) }}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> {{ _i('Edit') }}</a>
    <?php
    $route = ["$resourcePrefix.destroy", $object->pk];
    $formName = 'post_' . md5(json_encode($route));
    $confirm = _i('Are you sure?');
    $onclick = "if (confirm('$confirm')) { document.$formName.submit(); } event.returnValue = false; return false;";
    ?>
    <a href="#" onclick="{!! $onclick !!}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ _i('Delete') }}</a>
    {{ Form::open(['route' => $route, 'method' => 'delete', 'name' => $formName]) }}
    {{ Form::close() }}
</div>