@if ($node->subtree->isNotEmpty())
    <div class="dropdown-menu">
        @tree(['tree' => $node->subtree, 'params' => $params])
    </div>
@endif