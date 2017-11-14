@if ($node->subtree->isNotEmpty())
    <li class="dropdown">
        <a href="{{ $node->associatedUrl }}" class="dropdown-toggle" data-toggle="dropdown">{{ $node->title }} {{--<span class="caret"></span>--}}</a>
        @include('tree.navbar.recurse')
    </li>
@else
    <li>
        <a href="{{ $node->associatedUrl }}"{!! Html::attributes($node->attributes_to_array) !!}>{{ $node->title }}</a>
        @include('tree.navbar.recurse')
    </li>
@endif