@if (count($breadcrumbs) > 1)
    <ul class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($loop->last)
                <li class="breadcrumb-item active">{{ $breadcrumb['title'] }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ !empty($breadcrumb['route']) ? route($breadcrumb['route']) : $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
            @endif
        @endforeach
    </ul>
@endif