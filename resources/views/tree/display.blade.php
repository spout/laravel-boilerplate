<li>
    {{ $node->title }}
    @if (!empty($node->subtree))
        @tree(['tree' => $node->subtree, 'view' => $view, 'tag' => $tag])
    @endif
</li>