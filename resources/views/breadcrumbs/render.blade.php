@if (!empty($breadcrumbs))
    <ul class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($loop->last)
                <li class="active">{{ $breadcrumb['title'] }}</li>
            @else
                <li><a href="{{ !empty($breadcrumb['route']) ? route($breadcrumb['route']) : $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
            @endif
        @endforeach
    </ul>
@endif