<li>
    {{ $node->title }}
    @include('tree.recurse', ['params' => array_merge($params, ['level' => $params['level'] + 1])])
</li>