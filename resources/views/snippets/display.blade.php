@if (!empty($snippet->component))
    @component($snippet->component)
        @slot('title')
            {{ $snippet->title }}
        @endslot
        {!! Shortcode::compile($snippet->content) !!}
    @endcomponent
@else
    {!! Shortcode::compile($snippet->content) !!}
@endif