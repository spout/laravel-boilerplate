@if ($node->subtree->isNotEmpty())
    @tree(['tree' => $node->subtree, 'params' => $params])
@endif