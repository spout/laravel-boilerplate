@foreach($actions as $action => $view)
    @if (is_int($action))
        @include("includes.datatables.actions.{$view}")
    @else
        @include($view)
    @endif
@endforeach