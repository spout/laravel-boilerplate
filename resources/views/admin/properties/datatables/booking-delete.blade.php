<?php
//$route = ["admin.properties.booking-delete", $booking->pk];
$route = ["admin.bookings.destroy", $booking->pk];
$formName = 'post_' . md5(json_encode($route));
$confirm = _i('Are you sure?');
$onclick = "if (confirm('$confirm')) { document.$formName.submit(); } event.returnValue = false; return false;";
?>
<a href="#" onclick="{!! $onclick !!}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> {{ _i('Delete') }}</a>
{{ Form::open(['route' => $route, 'method' => 'delete', 'name' => $formName]) }}
{{ Form::close() }}