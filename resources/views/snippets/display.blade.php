@if (!empty($snippet->component))
    @component($snippet->component)
        @slot('title')
            {{ $snippet->title }}
        @endslot
        {!! $snippet->content or '' !!}
    @endcomponent
@else
    {!! $snippet->content or '' !!}
@endif