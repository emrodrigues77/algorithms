<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Tree {
    public TreeNode $root;

    function __construct($root) {
        $this->root = $root;
    }

    function traverse() {
        $this->traverseNode($this->root);
    }

    function traverseNode($node) {
        echo $node->val . " -- ";

        if ($node->left !== null) {
            $this->traverseNode($node->left);
        }

        if ($node->right !== null) {
            $this->traverseNode($node->right);
        }
    }
}

$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node5 = new TreeNode(5);

$node3->right = $node4;
$node2->left = $node5;
$node1->left = $node2;
$node1->right = $node3;
$tree = new Tree($node1);
$tree->traverse();