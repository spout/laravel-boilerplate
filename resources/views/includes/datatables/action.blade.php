<div class="btn-group btn-group-xs">
    @if (in_array('show', $actions))
        <a href="{{ route("$resourcePrefix.show", [$object->pk]) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> {{ _i('View') }}</a>
    @endif
    @if (in_array('edit', $actions))
        <a href="{{ route("$resourcePrefix.edit", [$object->pk]) }}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i> {{ _i('Edit') }}</a>
    @endif
    @if (in_array('delete', $actions))
        <?php
        $route = ["$resourcePrefix.destroy", $object->pk];
        $formName = 'post_' . md5(json_encode($route));
        $confirm = _i('Are you sure?');
        $onclick = "if (confirm('$confirm')) { document.$formName.submit(); } event.returnValue = false; return false;";
        ?>
        <a href="#" onclick="{!! $onclick !!}" class="btn btn-danger"><i class="fa fa-trash"></i> {{ _i('Delete') }}</a>
        {{ Form::open(['route' => $route, 'method' => 'delete', 'name' => $formName]) }}
        {{ Form::close() }}
    @endif
</div>