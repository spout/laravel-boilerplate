@if ($node->subtree->isNotEmpty())
    @tree(['tree' => $node->subtree, 'params' => array_merge($params, ['attributes' => ['class' => 'dropdown-menu']])])
@endif