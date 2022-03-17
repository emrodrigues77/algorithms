<?php

/*
Given the head of a linked list, return the list after sorting it in ascending order.

Example 1:
Input: head = [4,2,1,3]
Output: [1,2,3,4]

Example 2:
Input: head = [-1,5,3,4,0]
Output: [-1,0,3,4,5]

Example 3:
Input: head = []
Output: []

Constraints:
    The number of nodes in the list is in the range [0, 5 * 104].
    -105 <= Node.val <= 105
*/

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function sortList($head) {

        if ($head->next === null) {
            return $head;
        }

        $nums = [];

        while ($head->next !== null) {
            $nums[] = $head->val;
            $head = $head->next;
        }

        $nums[] = $head->val;
        sort($nums);

        $head = new ListNode();
        $node = $head;

        foreach ($nums as $num) {
            $new = new ListNode($num);
            $node->next = $new;
            $node = $new;
        }

        return $head->next;
    }
}
