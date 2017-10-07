@if (!empty($node->subtree))
    @tree(['tree' => $node->subtree, 'view' => $view, 'tag' => $tag, 'extraData' => $extraData])
@endif