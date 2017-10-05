<?php

namespace App\Libraries;

use Illuminate\Database\Eloquent\Collection;

class TreeCollection extends Collection
{

    /**
     * Build tree structure from the collection.
     *
     * @return static
     */
    public function buildTree()
    {
        $structure = $this->matchNodes();

        $this->clean($structure);

        return $structure;
    }

    /**
     * Match child nodes with the parents.
     *
     * @return static
     */
    protected function matchNodes()
    {
        $structure = new static($this->items);

        foreach ($this->items as $key => $node) {
            $parentId = $node->parent_id;
            $nodeId = $node->getKey();
            if ($parentId) {
                $parent = $structure->find($parentId)
                    ->subtree
                    ->add($node);
            }
        }

        return $structure;
    }

    /**
     * Clean root level of the structure.
     *
     * @param  static $structure
     *
     * @return void
     */
    protected function clean($structure)
    {
        foreach ($structure as $key => $node) {
            if ($node->parent_id) {
                $structure->forget($key);
            }
        }
    }
}