@if (!empty($snippet->component))
    @component($snippet->component)
        {!! $snippet->content or '' !!}
    @endcomponent
@else
    {!! $snippet->content or '' !!}
@endif