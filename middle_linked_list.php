<?php

/*
Given the head of a singly linked list, return the middle node of the linked list.

If there are two middle nodes, return the second middle node.

Example 1:
Input: head = [1,2,3,4,5]
Output: [3,4,5]
Explanation: The middle node of the list is node 3.

Example 2:
Input: head = [1,2,3,4,5,6]
Output: [4,5,6]
Explanation: Since the list has two middle nodes with values 3 and 4, we return the second one.

Constraints:
    The number of nodes in the list is in the range [1, 100].
    1 <= Node.val <= 100
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
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {

        $l = 0;
        $node = $head;

        while ($node) {
            $l++;
            $node = $node->next;
        }

        if ($l === $n) {
            $node = $head->next;
            $head->next = null;
            return $node;
        }

        $i = 1;
        $node = $head->next;
        $prev = $head;

        while ($node) {
            if ($i === $l - $n) {
                $prev->next = $node->next;
                $node->next = null;
                return $head;
            }

            $i++;
            $prev = $node;
            $node = $node->next;
        }
    }
}