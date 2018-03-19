@foreach($actions as $action => $view)
    @if (is_int($action))
        @includeFirst(["{$resourcePrefix}.includes.datatables.actions.{$view}", "includes.datatables.actions.{$view}"])
    @else
        @include($view)
    @endif
@endforeach