@if (!empty($node->subtree))
    @tree(['tree' => $node->subtree, 'params' => $params])
@endif