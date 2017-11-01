@if (in_array('delete', $actions) || array_key_exists('delete', $actions))
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