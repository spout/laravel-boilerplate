@if (!empty($node->view))
    <li class="nav-item dropdown">
        <a href="{{ $node->associatedUrl }}" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $node->title }}</a>
        <div class="dropdown-menu">
            <div class="container-fluid">
            @includeIf($node->view)
            </div>
        </div>
    </li>
@else
    @if ($params['level'] === 1)
        <a href="{{ $node->associatedUrl }}" class="dropdown-item">{{ $node->title }}</a>
    @else
        <li class="nav-item">
            <a href="{{ $node->associatedUrl }}"{!! Html::attributes(array_merge(['class' => 'nav-link'], $node->attributes_to_array ?? [])) !!}>{{ $node->title }}</a>
        </li>
    @endif
@endif