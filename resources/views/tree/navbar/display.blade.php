@if ($node->subtree->isNotEmpty())
    <li class="nav-item dropdown">
        <a href="{{ $node->associatedUrl }}" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $node->title }}</a>
        @include('tree.navbar.recurse', ['params' => array_merge($params, ['level' => $params['level'] + 1, 'tag' => null])])
    </li>
@else
    @if ($params['level'] === 1)
        <a href="{{ $node->associatedUrl }}" class="dropdown-item">{{ $node->title }}</a>
    @else
        <li class="nav-item">
            <a href="{{ $node->associatedUrl }}"{!! Html::attributes(array_merge(['class' => 'nav-link'], $node->attributes_to_array ?? [])) !!}>{{ $node->title }}</a>
            @include('tree.navbar.recurse')
        </li>
    @endif
@endif