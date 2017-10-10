@if (!empty($node->subtree))
    <ul>
        @tree(['tree' => $node->subtree, 'params' => $params])
    </ul>
@endif