<?php

/*
Given the root of a binary tree, check whether it is a mirror of itself (i.e., symmetric around its center).

Example 1:
Input: root = [1,2,2,3,4,4,3]
Output: true

Example 2:
Input: root = [1,2,2,null,3,null,3]
Output: false

Constraints:
    The number of nodes in the tree is in the range [1, 1000].
    -100 <= Node.val <= 100

Follow up: Could you solve it both recursively and iteratively?
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
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        if (!$root) return true;
        return $this->compare($root->left, $root->right);
    }

    function compare($node1, $node2) {
        if (!$node1 && !$node2) {
            return true;
        }

        if (!$node1 || !$node2) {
            return false;
        }

        if ($node1->val !== $node2->val) {
            return false;
        }

        return $this->compare($node1->left, $node2->right) && $this->compare($node1->right, $node2->left);
    }
}