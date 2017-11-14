<div id="snippet-{{ $snippet->slug }}">
    @if (Auth::check() && Auth::user()->is_admin)
        <div class="text-right"><a href="{{ route('admin.snippets.edit', [$snippet->pk]) }}" class="btn btn-default btn-xs" title="{{ _i("Edit snippet") }}" data-edit-target="#snippet-{{ $snippet->slug }}">{{ _i("Edit") }}</a></div>
    @endif
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
</div>