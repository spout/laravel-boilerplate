@if ($node->subtree->isNotEmpty())
    <li class="dropdown">
        <a href="{{ $node->url }}" class="dropdown-toggle" data-toggle="dropdown">{{ $node->title }} <span class="caret"></span></a>
        @include('tree.navbar.recurse')
    </li>
@else
    <li>
        <a href="{{ $node->url }}">{{ $node->title }}</a>
        @include('tree.navbar.recurse')
    </li>
@endif