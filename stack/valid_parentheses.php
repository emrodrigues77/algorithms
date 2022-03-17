<?php

/*
Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
An input string is valid if:
    Open brackets must be closed by the same type of brackets.
    Open brackets must be closed in the correct order.

Example 1:
Input: s = "()"
Output: true

Example 2:
Input: s = "()[]{}"
Output: true

Example 3:
Input: s = "(]"
Output: false

Constraints:
    1 <= s.length <= 104
    s consists of parentheses only '()[]{}'.
*/
class Solution {

    protected array $stack = [];

    const MAP = [
        ')' => '(',
        ']' => '[',
        '}' => '{',
    ];

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {

        $chars = str_split($s);

        foreach ($chars as $char) {
            if (in_array($char, self::MAP)) {
                $this->stack[] = $char;
                continue;
            }

            $lastBracket = array_pop($this->stack);

            if (self::MAP[$char] != $lastBracket) {
                return false;
            }
        }

        return count($this->stack) == 0;
    }
}