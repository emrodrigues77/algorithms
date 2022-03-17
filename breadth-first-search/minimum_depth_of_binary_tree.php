<?php

/*
Given a binary tree, find its minimum depth.
The minimum depth is the number of nodes along the shortest path from the root node down to the nearest leaf node.
Note: A leaf is a node with no children.

Example 1:
Input: root = [3,9,20,null,null,15,7]
Output: 2

Example 2:
Input: root = [2,null,3,null,4,null,5,null,6]
Output: 5

Constraints:
    The number of nodes in the tree is in the range [0, 105].
    -1000 <= Node.val <= 1000

*/

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $tree
     * @return Integer
     */
    function minDepth($tree) {
        if ($tree === null) {
            return 0;
        }

        if ($tree->left === null) {
            return $this->minDepth($tree->right) + 1;
        }

        if ($tree->right === null) {
            return $this->minDepth($tree->left) + 1;
        }

        $leftDepth = $this->minDepth($tree->left);
        $rightDepth = $this->minDepth($tree->right);

        return min($leftDepth, $rightDepth) + 1;
    }
}