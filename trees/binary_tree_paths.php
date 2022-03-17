<?php
/*
Given the root of a binary tree, return all root-to-leaf paths in any order.
A leaf is a node with no children.

Example 1:
Input: root = [1,2,3,null,5]
Output: ["1->2->5","1->3"]

Example 2:
Input: root = [1]
Output: ["1"]

Constraints:
    The number of nodes in the tree is in the range [1, 100].
    -100 <= Node.val <= 100
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
     * @return String[]
     */
    function binaryTreePaths($root) {
        $results = [];
        $currentPath = '';
        return $this->pathHelper($root, $results, $currentPath);
    }

    function pathHelper($root, array $results, string $currentPath) {
        if (!$root->left && !$root->right) {
            $currentPath .= $root->val;
            $results[] = $currentPath;
            return $results;
        }

        $currentPath .= $root->val . '->';
        
        if ($root->left) {
            $results = $this->pathHelper($root->left, $results, $currentPath);
        }

        if ($root->right) {
            $results = $this->pathHelper($root->right, $results, $currentPath);
        }

        return $results;
    }
}